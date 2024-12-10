<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Get locale from the URL segment or fallback to session/default
        $locale = $request->route('locale', $request->session()->get('locale', config('app.locale')));

        // Define supported locales
        $supportedLocales = ['en', 'fa'];

        // Validate locale
        if (!in_array($locale, $supportedLocales)) {
            $locale = config('app.locale');
        }

        // Set locale in the application and session
        App::setLocale($locale);
        session(['locale' => $locale]);

        \Log::info('Current locale:', [app()->getLocale()]);

        return $next($request);
    }
}
