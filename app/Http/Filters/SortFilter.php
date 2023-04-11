<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Closure;

/**
 * returns the query ordered and sorted by params sort and order respectively from the request.
 * if the order input is not present the default order will be descending.
 */

class SortFilter
{
    public function handle($query, Closure $next): Builder
    {
        if (request()->has('sort')) {
            return $next($query)->orderBy(request('sort'), $request('order') ?? 'desc');
        }

        return $next($query);
       
    }
}