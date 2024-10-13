<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\Service; 
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch product data
        $products = Product::all();
        $categories = Category::all();
    
        // Headers for Products and Categories
        $productHeaders = [
            'ریف',
            'نام محصول',
            'دسته‌بندی',
            'توضیحات',
            'تصویر',
            'نام صفحه',
            'عملیات'
        ];
        
        $categoryHeaders = [
            'ردیف',
            'نام دسته بندی',
            'نام صفحه',
            'عملیات'
        ];
    
        $serviceHeaders = [
            'شناسه',
            'نام خدمت',
            'دسته‌بندی',
            'توضیحات',
            'تصاویر',
            'عملیات'
        ];
    
        // Fetch the most viewed and clicked products data for chart
        $mostViewedAndClickedProducts = $this->getMostViewedAndClickedProducts();
        // Return the view with all data
        return view('admin.dashboard', compact(
            'products', 
            'categories', 
            'productHeaders', 
            'categoryHeaders', 
            'serviceHeaders', 
            'mostViewedAndClickedProducts' // Ensure this is passed to the view
        ));
    }
    // Function to get the most viewed and clicked products for each month
    public function getMostViewedAndClickedProducts()
    {
        $currentYear = Carbon::now()->year;
    
        // Fetch most viewed and clicked products for the current year
        $products = Product::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('MAX(views) as max_views'),
            DB::raw('MAX(clicks) as max_clicks'),
            'name'
        )
        ->whereYear('created_at', $currentYear) // Make sure you're fetching data for the current year
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
    

    // Create product method
    public function create()
    {
        // Fetch categories
        $categories = Category::all()->groupBy('page_name');

        return view('products.create', compact('categories'));
    }

    // Store product method
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'page_name' => 'required|string',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Create product
        Product::create($data);

        return redirect()->route('dashboard')->with('success', 'محصول با موفقیت ایجاد شد.');
    }

    // Edit product method
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    // Update product method
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer',
            'image' => 'nullable|image'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Update product
        $product->update($data);

        // Redirect to the dashboard
        return redirect()->route('dashboard')->with('success', 'محصول با موفقیت ویرایش شد.');
    }

    // Destroy (delete) product method
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard')->with('success', 'محصول با موفقیت حذف شد.');
    }

    // Show product method (view product details)
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
    
    // Other product-related methods (khoskkon, korepokht, mashinAlatShekldehi, mashinalatvatajhizat)
    public function khoskkon(Request $request)
    {

        $categories = Category::where('page_name', 'خشک کن')->get();
        $products = Product::where('page_name', 'خشک کن')->get();

        foreach ($products as $product) {
            $product->increment('views');
        }

        $selectedCategory = $request->query('category', 'all'); 
        $categories = Category::where('page_name', 'khoskkon')->get();
        $productsQuery = Product::where('page_name', 'khoskkon');

        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->get();

        return view('products.khoskkon', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory
        ]);
    }

    public function korepokht(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $categories = Category::where('page_name', 'korepokht')->get();
        $productsQuery = Product::where('page_name', 'korepokht');

        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->get();

        // Fetch data for the dashboard (clicks for the products)
        $mostClickedProducts = Product::orderBy('clicks', 'desc')->take(5)->get(); // Get top 5 clicked products

        return view('products.korepokht', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'mostClickedProducts' => $mostClickedProducts // Pass to view
        ]);
    }


    public function mashinAlatShekldehi(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $categories = Category::where('page_name', 'mashinAlatShekldehi')->get();
        $productsQuery = Product::where('page_name', 'mashinAlatShekldehi');

        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->get();

        return view('products.mashinAlatShekldehi', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory
        ]);
    }

    public function mashinalatvatajhizat(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $categories = Category::where('page_name', 'mashinalatvatajhizat')->get();
        $productsQuery = Product::where('page_name', 'mashinalatvatajhizat');
 
        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->get();

        return view('products.mashinalatvatajhizat', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}
