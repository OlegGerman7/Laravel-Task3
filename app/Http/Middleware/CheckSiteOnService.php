<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;

class CheckSiteOnService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Route::currentRouteName() != 'site.on.service' && !empty($_ENV['SITE_ON_SERVICE']) && $_ENV['SITE_ON_SERVICE'] == 1){
            return redirect()->route('site.on.service');
        }
        return $next($request);
    }
}
