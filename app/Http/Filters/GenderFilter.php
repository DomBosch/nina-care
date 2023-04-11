<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class GenderFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if(request()->has('gender')){
            $query->where('gender', request('gender'));
        }
     
        return $next($query);
    }
}