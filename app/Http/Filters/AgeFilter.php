<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

use Closure;

class AgeFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if(request()->has('age')){
            $query->where('age', request('age'));
        }
     
        return $next($query);
    }
}