<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service; 

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $services = Service::all();

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

        // Service headers
        $serviceHeaders = [
            'شناسه',
            'نام خدمت',
            'دسته‌بندی',
            'توضیحات',
            'تصاویر',
            'عملیات'
        ];

        return view('admin.dashboard', compact('products', 'categories', 'services', 'productHeaders', 'categoryHeaders', 'serviceHeaders'));
    }
}