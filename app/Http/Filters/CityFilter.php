<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class AgeFilter
{
    public function handle($query, Closure $next): Builder
    {
        if(request()->has('city')){
            $query->where('city', request('city'));
        }
     
        return $next($query);
    }
}