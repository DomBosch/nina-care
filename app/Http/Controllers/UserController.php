<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Filters\AgeFilter;
use App\Http\Filters\GenderFilter;
use App\Http\Filters\NameFilter;
use App\Http\Filters\ReligionFilter;
use App\Http\Filters\SortFilter;



class UserController extends Controller
{
    public function index(): Collection
    {
        return User::all();
    }

    //possible points of future improvements:
    // - caching.
    // - handle empty query results on backend rather than frontend.
    // - validate input

    /**
     * sends the request params through a pipeline that modifies the query builder object in each class.
     * once done, returns a collection of the model queries with applied filters
     * @return Collection
     */

    public function filterMethodOne(): Collection
    {
        $users = app(Pipeline::class)
            ->send(User::query())
            ->through([
                NameFilter::class,
                AgeFilter::class,
                GenderFilter::class,
                ReligionFilter::class,
                SortFilter::class,
            ])
            ->thenReturn()
            ->get();

            // return users found directly to DOM, in production inject $users to view.
            return $users;
    }

    // possible points of improvement depending on scope and wishes:
    // - inject filters arrays 

     /**
     * sends the request params through a pipeline that modifies the query builder object in each class.
     * once done, returns a collection of the model queries with applied filters
     * @param Request $request
     * @return Collection
     */
    public function filterMethodTwo(Request $request): Collection
    {
        $users = User::query()
            ->filter()
            ->get();
        
        // return users found directly to DOM, in production instead inject $users to view.
        return $users;

    }

}
