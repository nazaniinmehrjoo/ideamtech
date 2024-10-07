<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all products
        $products = Product::all();
    
        // Fetch all categories
        $categories = Category::all();
    
        // Product headers
        $productHeaders = [
            'ریف',
            'نام محصول',
            'دسته‌بندی',
            'توضیحات',
            'تصویر',
            'نام صفحه',
            'عملیات'
        ];
    
        // Category headers
        $categoryHeaders = [
            'ردیف',
            'نام دسته بندی',
            'نام صفحه',
            'عملیات'
        ];
    
        return view('admin.dashboard', compact('products', 'categories', 'productHeaders', 'categoryHeaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->groupBy('page_name');
        
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'page_name' => 'required|string',
            'category_id' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);
    
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
    
        
        $product = Product::create($data);
    
        
        return redirect()->route('products.index')->with('success', 'محصول با موفقیت ایجاد شد.');
    }


    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        
        return view('products.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
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

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Delete the product image from storage
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }
    
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
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
