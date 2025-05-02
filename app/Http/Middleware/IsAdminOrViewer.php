<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminOrViewer
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $isAdmin = $user->is_admin ?? false;
        $isViewer = ($user->role ?? '') === 'viewer';

        if ($isAdmin || $isViewer) {
            return $next($request);
        }

        abort(403, 'شما اجازه دسترسی ندارید.');
    }
}
