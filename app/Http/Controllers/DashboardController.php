<?php

namespace App\Http\Controllers;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
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

        // Pass products and headers to the view
        return view('admin.dashboard', compact('products', 'categories', 'productHeaders', 'categoryHeaders'));
    }
}
