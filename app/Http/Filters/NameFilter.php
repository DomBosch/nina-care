<?php

namespace App\Http\Filters;

use Closure;

/**
 * Apply WHERE LIKE statement to curent query object only if name is present on input.
 */

class NameFilter
{
    public function handle($query, Closure $next)
    {
        if(request()->has('name')){
            $query->where('name', 'LIKE', '%'.request('name').'%');
        }
     
        return $next($query);
    }
}