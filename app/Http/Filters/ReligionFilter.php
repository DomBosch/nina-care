<?php

namespace App\Http\Filters;

use Closure;

class ReligionFilter
{
    public function handle($query, Closure $next)
    {
        if(request()->has('religion')){
            $query->where('religion', request('religion'));
        }
     
        return $next($query);
    }
}