<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->groupBy('page_name'); 
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
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
            'مساحت اشغال شده',
            'زمان خشک شدن',
            'هزینه تعمیر و نگهداری',
            'کیفیت محصول',
            'هزینه اپراتوری',
            'کیفیت ماشین آلات'
        ];

        $products = Product::where('page_name', 'khoskkon')->get();

        // Helper function to generate random color
        function randomColor()
        {
            $r = rand(0, 255);
            $g = rand(0, 255);
            $b = rand(0, 255);
            return "rgba($r, $g, $b, 0.2)"; // Background color with 0.2 opacity
        }

        $productDatasets = $products->map(function ($product) {
            $backgroundColor = randomColor();
            $borderColor = str_replace("0.2", "1", $backgroundColor); // Full opacity for border

            return [
                'label' => $product->name,
                'data' => [
                    $product->total_cost,
                    $product->energy_consumption,
                    $product->production_variety,
                    $product->occupied_area,
                    $product->drying_time,
                    $product->maintenance_cost,
                    $product->product_quality,
                    $product->operation_cost,
                    $product->machine_quality
                ],
                'backgroundColor' => $backgroundColor,
                'borderColor' => $borderColor,
                'borderWidth' => 2
            ];
        });

        return [
            'criteriaLabels' => $criteriaLabels,
            'productDatasets' => $productDatasets->toArray()
        ];
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
        $categories = Category::all()->groupBy('page_name');
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'page_name' => 'required|string',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|image',
            // Additional fields for khoskkon
            'total_cost' => 'nullable|integer',
            'energy_consumption' => 'nullable|integer',
            'production_variety' => 'nullable|integer',
            'occupied_area' => 'nullable|integer',
            'drying_time' => 'nullable|integer',
            'maintenance_cost' => 'nullable|integer',
            'product_quality' => 'nullable|integer',
            'operation_cost' => 'nullable|integer',
            'machine_quality' => 'nullable|integer'
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
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer',
            'image' => 'nullable|image',
            // Additional fields for khoskkon
            'total_cost' => 'nullable|integer',
            'energy_consumption' => 'nullable|integer',
            'production_variety' => 'nullable|integer',
            'occupied_area' => 'nullable|integer',
            'drying_time' => 'nullable|integer',
            'maintenance_cost' => 'nullable|integer',
            'product_quality' => 'nullable|integer',
            'operation_cost' => 'nullable|integer',
            'machine_quality' => 'nullable|integer'
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
