<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        
        $categories = Category::all()->groupBy('page_name');
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        
        $pages = ['khoskkon', 'korepokht', 'mashinAlatShekldehi', 'mashinalatvatajhizat']; 
        return view('categories.create', compact('pages'));
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'page_name' => 'required|string',
        ]);

        
        Category::create($data);

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

        // Validate the input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'page_name' => 'required|string',
        ]);

        
        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
    
        // Check if the category is assigned to any products
        if (Product::where('category_id', $category->id)->exists()) {
            return redirect()->back()->with('error', 'این دسته‌بندی به محصولی اختصاص داده شده است و نمی‌توانید آن را حذف کنید.');
        }
    
        $category->delete();
    
        return redirect()->route('dashboard')->with('success', 'دسته‌بندی با موفقیت حذف شد.');
    }
}
