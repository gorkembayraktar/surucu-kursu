<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

use App\Models\Settings;

class isMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   

        $m = Settings::where('key','active')->first();

        if($m && $m->value == 1 && !Auth::check()):
            return response()->view('front.maintenance');
        endif;

        return $next($request);
    }
}
