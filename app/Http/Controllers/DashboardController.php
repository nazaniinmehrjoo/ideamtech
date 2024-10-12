<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Project ;
use App\Models\Post;
use App\Models\Service; 

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $services = Service::all();
        $projects = Project::all();
        $posts = Post::all(); 

        // Headers for different sections
        $productHeaders = ['شناسه', 'نام', 'دسته‌بندی', 'توضیحات', 'تصویر', 'صفحه محصول', 'عملیات'];
        $categoryHeaders = ['شناسه', 'نام', 'صفحه دسته‌بندی', 'عملیات'];
        $serviceHeaders = ['شناسه', 'نام خدمت', 'دسته‌بندی', 'توضیحات', 'تصاویر', 'عملیات'];
        $projectHeaders = ['شناسه', 'نام پروژه', 'کارفرما', 'ظرفیت', 'وضعیت', 'تاریخ شروع', 'تاریخ پایان', 'نوع پروژه', 'عملیات'];
        $postHeaders = ['شناسه', 'عنوان', 'دسته‌بندی', 'تاریخ ایجاد', 'عملیات']; 

        // Pass all the data to the view
        return view('admin.dashboard', compact('products', 'categories', 'services', 'projects', 'posts', 'productHeaders', 'categoryHeaders', 'serviceHeaders', 'projectHeaders', 'postHeaders'));
    }
}    