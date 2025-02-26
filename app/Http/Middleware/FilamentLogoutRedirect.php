<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilamentLogoutRedirect
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!Auth::check() && $request->is('admin/logout')) {
            return redirect('/login'); // Redirect ke login Breeze
        }

        return $response;
    }
}
