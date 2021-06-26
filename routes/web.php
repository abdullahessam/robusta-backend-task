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

Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function (){
//    dd(App\Models\Reservation::find(1)->dispatchCity);
    $disp=1;
    $dest=2;/*
    $city=\App\Models\City::whereHas('lines.trip',);
        dd($city);*/
    $reservation=App\Models\Reservation::where(function ($q){
        $q->where('dispatch_city_order','>=',2)->where('destination_city_order','<=',3);
        $q->orWhere('dispatch_city_order','<=',2)->where('destination_city_order','>=',3);
    });
    dd($reservation->get());
   $trips= \App\Models\Trip::with('line.cities')->whereHas('line.cities',function ($q){
        $q->where('cities.id',1);
    })->whereHas('line.cities',function ($q){
        $q->where('cities.id',4);
    })->get();

    dd($trips);
});
