<?php

use App\Http\Controllers\{HomeController, GigController, UserController};
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'profile/{user}', 'as' => 'username.'], function () {

    Route::get('/', [UserController::class, 'show'])->name('show');

    Route::get('/{gig}', function ($user, $gig) {
        $GigController = new GigController;
        return $GigController->show($user, $gig);
    })->name('gig.show');

});

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard', function () {
        return Inertia::render('Dashboard');
    }
)->name('dashboard');
