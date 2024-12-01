<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $locale = app()->getLocale(); // Get the current locale
        $selectedPage = $request->query('page_name', 'all');
        $selectedCategory = $request->query('category_id', 'all');

        // Fetch categories
        $categoriesQuery = Category::query();
        if ($selectedPage !== 'all') {
            $categoriesQuery->where('page_name', $selectedPage);
        }
        $categories = $categoriesQuery->get()->map(function ($category) use ($locale) {
            // Localize category name and description
            $category->name = $category->getTranslatedName($locale);
            $category->description = $category->getTranslatedDescription($locale);
            return $category;
        });

        // Fetch products
        $productsQuery = Product::query();
        if ($selectedPage !== 'all') {
            $productsQuery->where('page_name', $selectedPage);
        }
        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->get()->map(function ($product) use ($locale) {
            // Localize product name and description
            $product->name = $product->getTranslatedName($locale);
            $product->description = $product->getTranslatedDescription($locale);
            return $product;
        })->groupBy('page_name');

        return view('products.index', compact('products', 'categories', 'selectedPage', 'selectedCategory'));
    }


    // Helper function to get filtered products and categories by page name and category
    private function getFilteredProductsAndCategories($pageName, $selectedCategory)
    {
        $categories = Category::where('page_name', $pageName)->get();
        $productsQuery = Product::where('page_name', $pageName);

        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->get();

        return compact('products', 'categories', 'selectedCategory');
    }

    // Dynamic comparison chart data
    public function getComparisonChartData()
    {
        $criteriaLabels = [
            'هزینه تمام شده',
            'مصرف انرژی',
            'تنوع تولید',
            'زمان خشک شدن',
            'هزینه تعمیر و نگهداری',
            'هزینه اپراتوری',
        ];

        $categories = Category::where('page_name', 'khoskkon')->get();

        $categoryDatasets = $categories->map(function ($category) {
            return [
                'label' => $category->getTranslatedName(app()->getLocale()), // Localized name
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
        })->toArray(); // Convert to plain array for JavaScript

        return [
            'criteriaLabels' => $criteriaLabels,
            'categoryDatasets' => $categoryDatasets,
        ];
    }

    private function randomColor($solid = false)
    {
        $opacity = $solid ? 1 : 0.2;
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);

        return "rgba($r, $g, $b, $opacity)";
    }





    // Show the comparison chart view
    public function showComparisonChart()
    {
        $chartData = $this->getComparisonChartData();
        return view('products.chart', $chartData);
    }

    // CRUD Methods for Products
    public function create()
    {
        $categories = Category::all();
        $pages = [
            'khoskkon' => 'خشک کن',
            'korepokht' => 'کوره پخت',
            'mashinAlatShekldehi' => 'ماشین آلات شکل دهی',
            'mashinalatvatajhizat' => 'ماشین آلات و تجهیزات',
        ];

        return view('products.create', compact('categories', 'pages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|array',
            'name.en' => 'required|string|max:255',
            'name.fa' => 'required|string|max:255',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.fa' => 'nullable|string',
            'page_name' => 'required|string',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت ایجاد شد.');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $locale = app()->getLocale();

        $categories = Category::all()->map(function ($category) use ($locale) {
            $category->name = $category->getTranslatedName($locale);
            return $category;
        });

        $pages = [
            'khoskkon' => 'خشک کن',
            'korepokht' => 'کوره پخت',
            'mashinAlatShekldehi' => 'ماشین آلات شکل دهی',
            'mashinalatvatajhizat' => 'ماشین آلات و تجهیزات',
        ];

        return view('products.edit', compact('product', 'categories', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|array',
            'name.en' => 'required|string|max:255',
            'name.fa' => 'required|string|max:255',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.fa' => 'nullable|string',
            'page_name' => 'required|string',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت ویرایش شد.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard')->with('success', 'محصول با موفقیت حذف شد.');
    }

    public function show(Product $product)
    {
        $product->increment('views');
        return view('products.show', compact('product'));
    }

    public function trackClick(Product $product)
    {
        $product->increment('clicks');
        return response()->json(['message' => 'Click tracked successfully']);
    }

    // Methods for Product Pages
    public function khoskkon(Request $request)
    {
        // Get the filtered products and categories
        $data = $this->getFilteredProductsAndCategories('khoskkon', $request->query('category', 'all'));

        // Get comparison chart data
        $chartData = $this->getComparisonChartData();

        // Merge chart data with the existing data for the view
        $data = array_merge($data, $chartData);

        return view('products.khoskkon', $data);
    }

    public function korepokht(Request $request)
    {
        $data = $this->getFilteredProductsAndCategories('korepokht', $request->query('category', 'all'));
        $data['mostClickedProducts'] = Product::orderBy('clicks', 'desc')->take(5)->get();
        return view('products.korepokht', $data);
    }

    public function mashinAlatShekldehi(Request $request)
    {
        $data = $this->getFilteredProductsAndCategories('mashinAlatShekldehi', $request->query('category', 'all'));
        return view('products.mashinAlatShekldehi', $data);
    }

    public function mashinalatvatajhizat(Request $request)
    {
        $data = $this->getFilteredProductsAndCategories('mashinalatvatajhizat', $request->query('category', 'all'));
        return view('products.mashinalatvatajhizat', $data);
    }

    // Function to get most viewed and clicked products
    public function getMostViewedAndClickedProducts()
    {
        $currentYear = Carbon::now()->year;

        $products = Product::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('MAX(views) as max_views'),
            DB::raw('MAX(clicks) as max_clicks'),
            'name'
        )
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'), 'name')
            ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
            ->get();

        if ($products->isEmpty()) {
            return [
                'months' => [],
                'mostViewed' => [],
                'mostClicked' => []
            ];
        }

        $chartData = [
            'months' => [],
            'mostViewed' => [],
            'mostClicked' => [],
        ];

        foreach ($products as $product) {
            $chartData['months'][] = Carbon::createFromDate(null, $product->month)->format('F');
            $chartData['mostViewed'][] = ['views' => $product->max_views];
            $chartData['mostClicked'][] = ['clicks' => $product->max_clicks];
        }

        return $chartData;
    }
}
