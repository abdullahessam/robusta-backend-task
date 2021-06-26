<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/', \App\Http\Controllers\Dashboard\IndexController::class)->name('index');

    Route::resources([
        'cities' => \App\Http\Controllers\Dashboard\BusController::class,
        'lines' => \App\Http\Controllers\Dashboard\LineController::class,
        'users' => \App\Http\Controllers\Dashboard\UserController::class,
        'buses' => \App\Http\Controllers\Dashboard\BusController::class,
        'admins' => \App\Http\Controllers\Dashboard\AdminController::class,
        'reservations' => \App\Http\Controllers\Dashboard\ReservationController::class,
        'trips' => \App\Http\Controllers\Dashboard\TripController::class
    ]);

});
require __DIR__ . '/auth.php';
