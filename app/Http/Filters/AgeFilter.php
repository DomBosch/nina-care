<?php

namespace App\Http\Filters;

use Closure;

class AgeFilter
{
    public function handle($query, Closure $next)
    {
        if(request()->has('age')){
            $query->where('age', request('age'));
        }
     
        return $next($query);
    }
}