<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class LanguageRedirectMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route('locale');

        $translations = [
            'خشک-کن/محصولات' => 'brick-dryer-types',
           ' کوره_پخت/محصولات' => 'hoffman-kiln',
        ];

        if ($locale === 'en') {
            foreach ($translations as $fa => $en) {
                if ($request->is("$locale/$fa")) {
                    return redirect()->to(url("$locale/$en"));
                }
            }
        }

        return $next($request);
    }
}
