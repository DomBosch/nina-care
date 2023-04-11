<?php

namespace App\Http\Filters;

use Closure;

class AgeFilter
{
    public function handle($query, Closure $next)
    {
        if(request()->has('city')){
            $query->where('city', request('city'));
        }
     
        return $next($query);
    }
}