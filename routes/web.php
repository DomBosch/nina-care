<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// shows users depending on class called in UserController.
// I've added two possible methods in the UserController to filter results in such a way the filter parameters are easily scaleable.
// filterMethodOne would be my prefered way of filtering as it leaves open the possibility to add other features: ie restraints, or policies

Route::get('/', [UserController::class, 'filterMethodOne']);
