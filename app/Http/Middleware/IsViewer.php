<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsViewer
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'viewer') {
            return $next($request);
        }

        abort(403, 'شما اجازه دسترسی ندارید.');
    }
}

