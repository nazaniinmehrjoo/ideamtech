<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = Document::query();

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

        $documents = $query->orderBy('serial_number')
            ->orderByDesc('revision_number')
            ->get()
            ->groupBy(function ($doc) {
                return "{$doc->owner_code}-{$doc->doc_type_code}-" . str_pad($doc->serial_number, 3, '0', STR_PAD_LEFT);
            });

        return view('fileUpload.index', compact('documents'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'owner_code' => 'required|string|max:10',
            'doc_type_code' => 'required|string|max:10',
            'file' => 'required|file|max:10240',
        ]);


        $latestDoc = Document::where('owner_code', $request->owner_code)
            ->where('doc_type_code', $request->doc_type_code)
            ->orderByDesc('serial_number')
            ->first();

        $newSerial = $latestDoc ? $latestDoc->serial_number + 1 : 1;
        $serialStr = str_pad($newSerial, 3, '0', STR_PAD_LEFT);
        $revisionNumber = 0;

        $extension = $request->file('file')->getClientOriginalExtension();
        $fileName = "{$request->owner_code}-{$request->doc_type_code}-{$serialStr}-{$revisionNumber}.{$extension}";

        $filePath = $request->file('file')->storeAs('documents', $fileName, 'public');

        Document::create([
            'owner_code' => $request->owner_code,
            'doc_type_code' => $request->doc_type_code,
            'serial_number' => $newSerial,
            'revision_number' => $revisionNumber,
            'file_path' => $filePath,
        ]);

        return redirect()->route('documents.index', ['locale' => app()->getLocale()])
            ->with('success', "سند جدید با موفقیت آپلود شد: $fileName");
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

        $latestRevision = Document::where('owner_code', $owner)
            ->where('doc_type_code', $type)
            ->where('serial_number', $serial)
            ->orderByDesc('revision_number')
            ->first();

        $newRevision = $latestRevision ? $latestRevision->revision_number + 1 : 1;

        $serialStr = str_pad($serial, 3, '0', STR_PAD_LEFT);
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileName = "{$owner}-{$type}-{$serialStr}-{$newRevision}.{$extension}";

        $filePath = $request->file('file')->storeAs('documents', $fileName, 'public');

        Document::create([
            'owner_code' => $owner,
            'doc_type_code' => $type,
            'serial_number' => $serial,
            'revision_number' => $newRevision,
            'file_path' => $filePath,
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
