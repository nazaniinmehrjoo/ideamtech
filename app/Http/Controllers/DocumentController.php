<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index(Request $request)
    {

        $owners = Document::select('owner_code')->distinct()->pluck('owner_code');
        $docTypes = Document::select('doc_type_code')->distinct()->pluck('doc_type_code');

        $ownerNames = [
            'MNG' => 'حوزه مدیرعامل',
            'SYS' => 'سیستم‌ها و فرآیندها',
            'COM' => 'بازرگانی',
            'INA' => 'حسابرسی داخلی',
            'FIN' => 'مالی و اقتصادی',
            'LAW' => 'حقوقی',
            'STR' => 'انبار',
            'GUR' => 'خدمات پس از فروش',
            'EXE' => 'اجرایی تولید',
            'QAL' => 'کنترل کیفیت',
            'SAL' => 'بازاریابی و فروش',
            'ENG' => 'طراحی و مهندسی',
            'HUR' => 'سرمایه انسانی',
            'PRJ' => 'پروژه‌ها',
        ];

        $docTypeNames = [
            'PS' => 'فرآیند',
            'PR' => 'روش اجرایی',
            'IN' => 'دستورالعمل',
            'FR' => 'فرم',
            'ST' => 'استراتژی',
            'RE' => 'آیین‌نامه',
            'CH' => 'چارت',
            'JD' => 'شرح وظایف',
            'default' => 'سایر',
        ];

        // Start query
        $query = Document::query();

        // Apply filters
        if ($request->filled('doc_type_code')) {
            $query->where('doc_type_code', $request->doc_type_code);
        }
        if ($request->filled('owner_code')) {
            $query->where('owner_code', $request->owner_code);
        }
        if ($request->filled('revision_number')) {
            $query->where('revision_number', $request->revision_number);
        }
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }
        if ($request->filled('code')) {
            $query->whereRaw("CONCAT(owner_code, '-', doc_type_code, '-', LPAD(serial_number, 3, '0'), '-', revision_number) LIKE ?", ["%{$request->code}%"]);
        }
        if ($request->filled('file_name')) {
            $query->where('file_name', 'LIKE', "%{$request->file_name}%");
        }

        // Paginate results BEFORE grouping
        $documentsRaw = $query->orderBy('serial_number')
            ->orderByDesc('revision_number')
            ->paginate(12);

        // Group documents for display
        $documents = $documentsRaw->getCollection()->groupBy(function ($doc) {
            return "{$doc->owner_code}-{$doc->doc_type_code}-" . str_pad($doc->serial_number, 3, '0', STR_PAD_LEFT);
        });

        // Return all necessary data to the view
        return view('fileUpload.index', compact(
            'documents',
            'documentsRaw',
            'owners',
            'docTypes',
            'ownerNames',
            'docTypeNames'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_code' => 'required|string|max:10',
            'doc_type_code' => 'required|string|max:10',
            'file' => 'required|file|max:10240',
            'file_name' => 'nullable|string|max:255',
        ]);

        // Get the latest document with same owner and type
        $latestDoc = Document::where('owner_code', $request->owner_code)
            ->where('doc_type_code', $request->doc_type_code)
            ->orderByDesc('serial_number')
            ->first();

        $newSerial = $latestDoc ? $latestDoc->serial_number + 1 : 1;
        $revisionNumber = 1;

        // Format serial and revision to 2 digits
        $serialStr = str_pad($newSerial, 2, '0', STR_PAD_LEFT);
        $revisionStr = str_pad($revisionNumber, 2, '0', STR_PAD_LEFT);

        $extension = $request->file('file')->getClientOriginalExtension();
        $fileName = "{$request->owner_code}-{$request->doc_type_code}-{$serialStr}-{$revisionStr}.{$extension}";

        $filePath = $request->file('file')->storeAs('documents', $fileName, 'public');

        $document = Document::create([
            'owner_code' => $request->owner_code,
            'doc_type_code' => $request->doc_type_code,
            'serial_number' => $newSerial,
            'revision_number' => $revisionNumber,
            'file_path' => $filePath,
            'file_name' => $request->file_name ?? $fileName,

        ]);

        session()->flash('undo_document_id', $document->id);

        return redirect()->route('documents.index', ['locale' => app()->getLocale()])
            ->with('success', "سند جدید با موفقیت آپلود شد: $fileName");
    }

    public function undo(Request $request)
    {
        $doc = Document::find($request->id);

        if ($doc) {
            // Optionally delete the physical file too
            \Storage::disk('public')->delete($doc->file_path);

            $doc->delete();

            return redirect()->route('documents.index', ['locale' => app()->getLocale()])
                ->with('success', 'آپلود آخرین سند لغو شد.');
        }

        return redirect()->route('documents.index', ['locale' => app()->getLocale()])
            ->with('error', 'سندی برای لغو یافت نشد.');
    }


    public function showForm()
    {
        return view('fileUpload.upload');
    }

    public function update(Request $request, $id)
    {
        $oldDocument = Document::findOrFail($id);

        $request->validate([
            'file' => 'required|file',
        ]);

        $owner = $oldDocument->owner_code;
        $type = $oldDocument->doc_type_code;
        $serial = $oldDocument->serial_number;

        // Get the latest revision for the same serial
        $latestRevision = Document::where('owner_code', $owner)
            ->where('doc_type_code', $type)
            ->where('serial_number', $serial)
            ->orderByDesc('revision_number')
            ->first();

        $newRevision = $latestRevision ? $latestRevision->revision_number + 1 : 1;

        // Format both serial and revision as 2 digits
        $serialStr = str_pad($serial, 2, '0', STR_PAD_LEFT);
        $revisionStr = str_pad($newRevision, 2, '0', STR_PAD_LEFT);

        $extension = $request->file('file')->getClientOriginalExtension();
        $fileName = "{$owner}-{$type}-{$serialStr}-{$revisionStr}.{$extension}";

        $filePath = $request->file('file')->storeAs('documents', $fileName, 'public');

        Document::create([
            'owner_code' => $owner,
            'doc_type_code' => $type,
            'serial_number' => $serial,
            'revision_number' => $newRevision,
            'file_path' => $filePath,
            'file_name' => $fileName,
        ]);


        return redirect()->route('documents.index', ['locale' => app()->getLocale()])
            ->with('success', "نسخه جدید آپلود شد: $fileName");
    }


    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('fileUpload.edit', compact('document'));
    }
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->route('documents.index', ['locale' => app()->getLocale()])
            ->with('success', 'سند با موفقیت حذف شد.');
    }
}
