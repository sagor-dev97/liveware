<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // ❌ Not logged in
        if (!session()->has('admin_logged_in')) {
            return redirect('/');
        }

        return $next($request);
    }
}
