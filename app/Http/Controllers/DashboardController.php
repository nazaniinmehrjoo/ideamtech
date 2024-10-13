<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Project;
use App\Models\Post;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all the needed data for the dashboard
        $categories = Category::all();
        $services = Service::all();
        $projects = Project::all();
        $posts = Post::all();

        // Fetch the most clicked products
        $mostClickedProducts = Product::orderBy('clicks', 'desc')->take(5)->get(); // Get the top 5 clicked products

        // Fetch data for the product charts with clicks and views
        $chartData = $this->getMostClickedAndViewedProducts();

        // Pass all the data, including the most clicked products and chart data, to the view
        return view('admin.dashboard', compact(
            'categories', 'services', 'projects', 'posts', 
            'mostClickedProducts', 
            'chartData' // Include chart data for clicks and views
        ));
    }

    public function getMostClickedAndViewedProducts()
    {
        $currentYear = Carbon::now()->year;

        $products = Product::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(clicks) as total_clicks'),
            DB::raw('SUM(views) as total_views')
        )
        ->whereYear('created_at', $currentYear)
        ->where('clicks', '>', 0) 
        ->where('views', '>', 0)  
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
        ->get();

        if ($products->isEmpty()) {
            return [
                'months' => [],
                'clicks' => [],
                'views' => []
            ];
        }

        $chartData = [
            'months' => [],
            'clicks' => [],
            'views' => [],
        ];


        foreach ($products as $product) {
            $chartData['months'][] = $this->convertToPersianMonth($product->month); 
            $chartData['clicks'][] = $product->total_clicks;
            $chartData['views'][] = $product->total_views;
        }

        return $chartData;
    }

    // Function to convert Gregorian months to Persian months
    private function convertToPersianMonth($month)
    {
        $persianMonths = [
            1 => 'فروردین',
            2 => 'اردیبهشت',
            3 => 'خرداد',
            4 => 'تیر',
            5 => 'مرداد',
            6 => 'شهریور',
            7 => 'مهر',
            8 => 'آبان',
            9 => 'آذر',
            10 => 'دی',
            11 => 'بهمن',
            12 => 'اسفند',
        ];

        return $persianMonths[$month];
    }
    public function showDashboard()
    {
        $visitsData = DB::table('user_visits')
            ->select(DB::raw('count(*) as visit_count'), DB::raw('SUM(time_spent) as total_time'), 'country')
            ->groupBy('country')
            ->get();

        // Fetch the most clicked products
        $mostClickedProducts = DB::table('products')
            ->orderBy('clicks', 'desc')
            ->take(5)
            ->get();

        // Pass data to the view
        return view('admin.dashboard', compact('visitsData', 'mostClickedProducts'));
    }

    
    
}
