<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAdminLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('admin_logged_in')) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
