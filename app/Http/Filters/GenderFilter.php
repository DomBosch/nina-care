<?php

namespace App\Http\Filters;

use Closure;

class GenderFilter
{
    public function handle($query, Closure $next)
    {
        if(request()->has('gender')){
            $query->where('gender', request('gender'));
        }
     
        return $next($query);
    }
}