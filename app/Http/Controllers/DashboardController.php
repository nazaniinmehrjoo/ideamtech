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

    // Function to get the most clicked and viewed products for each month
    public function getMostClickedAndViewedProducts()
    {
        $currentYear = Carbon::now()->year;

        // Fetch the most clicked and viewed products for each month in the current year
        $products = Product::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(clicks) as total_clicks'),
            DB::raw('SUM(views) as total_views')
        )
        ->whereYear('created_at', $currentYear)
        ->where('clicks', '>', 0) // Ensure we only fetch products with clicks
        ->where('views', '>', 0)  // Ensure we only fetch products with views
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
        ->get();

        // If no data is available, return an empty array
        if ($products->isEmpty()) {
            return [
                'months' => [],
                'clicks' => [],
                'views' => []
            ];
        }

        // Prepare the chart data
        $chartData = [
            'months' => [],
            'clicks' => [],
            'views' => [],
        ];

        // Map product data to Persian months
        foreach ($products as $product) {
            $chartData['months'][] = $this->convertToPersianMonth($product->month); // Convert to Persian month
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
}
