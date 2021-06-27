<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Reservation\IndexRequest;
use App\Http\Requests\Api\Reservation\StoreRequest;
use App\Http\Resources\LineResource;
use App\Models\City;
use App\Models\Line;
use App\Models\Reservation;
use App\Models\Trip;
use Illuminate\Http\Request;
use JsonSchema\Exception\ValidationException;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store');
    }

    public function index(IndexRequest $request)
    {
        $lines=Line::with('cities','trips')->hasValidTrip($request)->get();
        removeUnSportedCitiesOnLine($lines,$request);
       return response()->json( LineResource::collection($lines));
    }

    public function store(StoreRequest $request)
    {
        $inputs=$request->validated();
        $trip=Trip::findOrFail($request['trip_id']);
        $inputs['user_id']=auth()->id();
        $inputs['dispatch_city_order']=$trip->line->getCityOrder($request['dispatch_city_id']);
        $inputs['destination_city_order']=$trip->line->getCityOrder($request['destination_city_id']);
        validateAvailableSeatNo($trip,$request['seat_no'],$inputs['dispatch_city_order'],$inputs['destination_city_order']);
        $reservation=$trip->reservations()->create($inputs);

        return response()->json(['message'=>"success your reservation number is : $reservation->id"]);
    }
}
