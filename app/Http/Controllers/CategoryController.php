<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'khoskkon'); // Default to 'khoskkon' if no filter is provided

        $categories = Category::where('page_name', $filter)->get(); // Ensure categories are being retrieved correctly
        $pages = ['khoskkon', 'korepokht', 'mashinAlatShekldehi', 'mashinalatvatajhizat'];

        // Prepare chart data if needed
        $criteriaLabels = [];
        $categoryDatasets = [];
        if ($filter === 'khoskkon') {
            $criteriaLabels = [
                'هزینه تمام شده',
                'مصرف انرژی',
                'تنوع تولید',
                'زمان خشک شدن',
                'هزینه تعمیر و نگهداری',
                'هزینه اپراتوری',
            ];

            $categoryDatasets = $categories->map(function ($category) {
                return [
                    'label' => $category->getTranslatedName(),
                    'data' => [
                        $category->total_cost ?? 0,
                        $category->energy_consumption ?? 0,
                        $category->production_variety ?? 0,
                        $category->drying_time ?? 0,
                        $category->maintenance_cost ?? 0,
                        $category->operation_cost ?? 0,
                    ],
                    'backgroundColor' => $this->randomColor(),
                    'borderColor' => $this->randomColor(true),
                    'borderWidth' => 2,
                ];
            })->toArray();
        }

        return view('categories.index', compact('categories', 'filter', 'pages', 'criteriaLabels', 'categoryDatasets'));
    }

    private function randomColor($solid = false)
    {
        $opacity = $solid ? 1 : 0.2;
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);

        return "rgba($r, $g, $b, $opacity)";
    }



    public function create()
    {
        $pages = ['khoskkon', 'korepokht', 'mashinAlatShekldehi', 'mashinalatvatajhizat'];
        return view('categories.create', compact('pages'));
    }
    public function store(Request $request)
    {
        // Log the incoming request data for debugging
        logger('Incoming Request Data:', $request->all());

        // Base validation for common fields
        $data = $request->validate([
            'name' => 'required|array',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.fa' => 'nullable|string',
            'name.en' => 'required|string|max:255',
            'name.fa' => 'required|string|max:255',
            'page_name' => 'required|string',
        ]);

        // Additional validation for khoskkon chart data
        if ($request->input('page_name') === 'khoskkon') {
            $chartData = $request->validate([
                'total_cost' => 'nullable|integer|min:0',
                'energy_consumption' => 'nullable|integer|min:0',
                'production_variety' => 'nullable|integer|min:0',
                'drying_time' => 'nullable|integer|min:0',
                'maintenance_cost' => 'nullable|integer|min:0',
                'operation_cost' => 'nullable|integer|min:0',
            ]);

            // Merge the chart data with the base data
            $data = array_merge($data, $chartData);
        }

        // Log the final data to be saved
        logger('Final Data for Category:', $data);

        // Create the category
        Category::create($data);

        // Redirect back with success message
        return redirect()->route('categories.index')->with('success', 'دسته بندی جدید با موفقیت ایجاد شد.');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $pages = ['khoskkon', 'korepokht', 'mashinAlatShekldehi', 'mashinalatvatajhizat'];
        return view('categories.edit', compact('category', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|array',
            'name.en' => 'required|string|max:255',
            'name.fa' => 'required|string|max:255',
            'page_name' => 'required|string',
            'description.en' => 'nullable|string',
            'description.fa' => 'nullable|string',
            'total_cost' => 'nullable|integer',
            'energy_consumption' => 'nullable|integer',
            'production_variety' => 'nullable|integer',
            'drying_time' => 'nullable|integer',
            'maintenance_cost' => 'nullable|integer',
            'operation_cost' => 'nullable|integer',
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'دسته‌بندی با موفقیت ویرایش شد.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if (Product::where('category_id', $category->id)->exists()) {
            return redirect()->back()->with('error', 'این دسته‌بندی به محصولی اختصاص داده شده است و نمی‌توانید آن را حذف کنید.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'دسته‌بندی با موفقیت حذف شد.');
    }

}
