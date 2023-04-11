<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        return User::all();
    }

     //possible points of future improvements:
    // - caching.
    // - handle empty query results on backend rather than frontend.
    // - validate input

    public function filterMethodOne()
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
    public function filterMethodTwo(Request $request)
    {
        $users = User::query()
            ->filter()
            ->get();
        
        // return users found directly to DOM, in production instead inject $users to view.
        return $users;

    }

}
