<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->session()->get('locale', config('app.locale'));
        \Log::info('Current locale:', [app()->getLocale()]);

        App::setLocale($locale);

        return $next($request);
    }
}
