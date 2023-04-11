<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Closure;

class ReligionFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if(request()->has('religion')){
            $query->where('religion', request('religion'));
        }
     
        return $next($query);
    }
}