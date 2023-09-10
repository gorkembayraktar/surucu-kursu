<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

use App\Models\Service;
use App\Models\Blog;

use Illuminate\Support\Facades\View;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
    
        $services = Service::orderBy('id', 'desc')->where('publish', \App\Enum\ServicesEnum::PUBLISHED)->limit(5)->get();
        $blogs = Blog::orderBy('id', 'desc')->where('publish', \App\Enum\BlogEnum::PUBLISHED)->limit(3)->get();
        View::share('menu',  (object)[
            "services" => $services,
            "blogs"    => $blogs
        ] );

        return $next($request);
    }
}
