<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Project;
use Carbon\Carbon;


class SitemapController extends Controller
{
    public function index()
    {
        
        $urls = [
            ['loc' => url('/'), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '1.0'],
            ['loc' => url('/info'), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => url('/درباره-ما'), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => url('/تماس-با-ما'), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => url('/مشاوره/خدمات'), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => url('/مشتریان-ما'), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ];

        
        $blogs = Post::latest()->get();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => url('/مقالات/' . $blog->slug),
                'lastmod' => $blog->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ];
        }

        
        $products = Product::latest()->get();
        foreach ($products as $product) {
            $urls[] = [
                'loc' => url('/products/' . $product->slug),
                'lastmod' => $product->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ];
        }

        
        $services = Service::latest()->get();
        foreach ($services as $service) {
            $urls[] = [
                'loc' => url('/services/' . $service->slug),
                'lastmod' => $service->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        $projects = Project::latest()->get();
        foreach ($projects as $project) {
            $urls[] = [
                'loc' => url('/projects/' . $project->slug),
                'lastmod' => $project->updated_at->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($url['loc']) . '</loc>';
            $xml .= '<lastmod>' . $url['lastmod'] . '</lastmod>';
            $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $url['priority'] . '</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
