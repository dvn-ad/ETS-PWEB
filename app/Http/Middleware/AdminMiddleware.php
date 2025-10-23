<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()){
            return redirect('/');
        }

        if (!auth()->user()->is_admin){
            return redirect('/');
        }

        return $next($request);
    }
}
