<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
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

        // Headers for Services
        $serviceHeaders = [
            'شناسه',
            'نام خدمت',
            'دسته‌بندی',
            'توضیحات',
            'تصاویر',
            'عملیات'
        ];

        // Return to the dashboard view
        return view('admin.dashboard', compact('products', 'categories', 'productHeaders', 'categoryHeaders', 'serviceHeaders'));
    }

    public function create()
    {
        // Fetch categories
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
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Create product
        Product::create($data);

        return redirect()->route('dashboard')->with('success', 'محصول با موفقیت ایجاد شد.');
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

    public function destroy(Product $product)
    {
        $product->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ]);
    }

    private function getServiceHeaders()
    {
        return [
            'شناسه',
            'نام خدمت',
            'دسته‌بندی',
            'توضیحات',
            'تصاویر',
            'عملیات'
        ];
    }

    public function khoskkon(Request $request)
    {
        
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
    
        // Fetch categories related to the 'korepokht' page from the database
        $categories = Category::where('page_name', 'korepokht')->get();
    
        // Fetch products for the 'korepokht' page
        $productsQuery = Product::where('page_name', 'korepokht');
    
        // Filter products by category if a specific category is selected
        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }
    
        $products = $productsQuery->get();
    
        // Pass the products, categories, and the selected category to the view
        return view('products.korepokht', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory
        ]);
    }
    
    public function mashinAlatShekldehi(Request $request)
    {
        // Get the selected category from the request, default to 'all'
        $selectedCategory = $request->query('category', 'all');
    
        // Fetch categories related to 'mashinAlatShekldehi' from the database
        $categories = Category::where('page_name', 'mashinAlatShekldehi')->get();
    
        // Fetch products for the 'mashinAlatShekldehi' page
        $productsQuery = Product::where('page_name', 'mashinAlatShekldehi');
    
        // Filter products by category if a specific category is selected
        if ($selectedCategory !== 'all') {
            $productsQuery->where('category_id', $selectedCategory);
        }
    
        $products = $productsQuery->get();
    
        // Pass the products, categories, and the selected category to the view
        return view('products.mashinAlatShekldehi', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory
        ]);
    }
    


    public function mashinalatvatajhizat(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        
        // Fetch categories for this page
        $categories = Category::where('page_name', 'mashinalatvatajhizat')->get();
    
        // Fetch products for this page
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
