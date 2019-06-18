<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class Categories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $categorySidebarList = Category::orderBy('id')->get();
        $request->categorySidebarList = $categorySidebarList;
        return $next($request);
    }
}
