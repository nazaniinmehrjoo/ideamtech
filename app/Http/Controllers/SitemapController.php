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
        $languages = ['fa', 'en']; // Define the available languages
        $urls = [];

        foreach ($languages as $lang) {
            // Static Pages
            $urls[] = ['loc' => url("/$lang"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '1.0'];
            $urls[] = ['loc' => url("/$lang/info"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'];
            $urls[] = ['loc' => url("/$lang/شبیه-ساز"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'];
            $urls[] = ['loc' => url("/$lang/متمایزازدیگران"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'];
            $urls[] = ['loc' => url("/$lang/پیوستن-به-خانواده-برناگستر"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'];
            $urls[] = ['loc' => url("/$lang/join-borna-gostar-family"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'];
            $urls[] = ['loc' => url("/$lang/تماس-با-ما"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'];
            $urls[] = ['loc' => url("/$lang/درباره-ما"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'];
            $urls[] = ['loc' => url("/$lang/مشتریان-ما"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'];

            // Services Pages
            $urls[] = ['loc' => url("/$lang/مشاوره/خدمات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            $urls[] = ['loc' => url("/$lang/تامین_قطعات/خدمات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            $urls[] = ['loc' => url("/$lang/خدمات_مهندسی/خدمات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            $urls[] = ['loc' => url("/$lang/نصب_و_راه_اندازی/خدمات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            $urls[] = ['loc' => url("/$lang/خدمات_پس_از_فروش/خدمات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];

            // Product Pages
            $urls[] = ['loc' => url("/$lang/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            $urls[] = ['loc' => url("/$lang/ماشین_آلات_و_تجهیزات/محصولات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            $urls[] = ['loc' => url("/$lang/خشک-کن-آجر/محصولات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            $urls[] = ['loc' => url("/$lang/کوره_پخت-آجر/محصولات"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];

            // English Product Pages
            if ($lang === 'en') {
                $urls[] = ['loc' => url("/$lang/brick-dryer-types"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
                $urls[] = ['loc' => url("/$lang/hoffman-kiln"), 'lastmod' => Carbon::now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.6'];
            }

            // Blog Pages
            $blogs = Post::latest()->get();
            foreach ($blogs as $blog) {
                $urls[] = [
                    'loc' => url("/$lang/مقالات/" . $blog->slug),
                    'lastmod' => $blog->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.7',
                ];
            }

            // Product Pages (Dynamic)
            $products = Product::latest()->get();
            foreach ($products as $product) {
                $urls[] = [
                    'loc' => url("/$lang/products/" . $product->slug),
                    'lastmod' => $product->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.7',
                ];
            }

            // Service Pages (Dynamic)
            $services = Service::latest()->get();
            foreach ($services as $service) {
                $urls[] = [
                    'loc' => url("/$lang/services/" . $service->slug),
                    'lastmod' => $service->updated_at->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.6',
                ];
            }

            // Project Pages (Dynamic)
            $projects = Project::latest()->get();
            foreach ($projects as $project) {
                $urls[] = [
                    'loc' => url("/$lang/projects/" . $project->slug),
                    'lastmod' => $project->updated_at->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.6',
                ];
            }
        }

        // Generate XML
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
