<?php

namespace App\Models;

use App\relations\ReservationHasCity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'user_id', 'dispatch_city_id', 'destination_city_id', 'seat_no', 'destination_city_order', 'dispatch_city_order'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dispatchCity()
    {
        return $this->belongsTo(City::class, 'dispatch_city_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function cities()
    {
        return new ReservationHasCity(City::query(), $this);
    }

    public  function ScopeBookedTickets($query,$line,$dispatch_city_order, $destination_city_order)
    {
        //get order of dispatch and destination city to get the booked tickets

         $query->where(function ($q) use ($dispatch_city_order, $destination_city_order) {
            $q->where('dispatch_city_order', '>=', $dispatch_city_order)->where('destination_city_order', '<=', $destination_city_order);
            $q->orWhere('dispatch_city_order', '<=', $dispatch_city_order)->where('destination_city_order', '>=', $destination_city_order);
        });
    }

}
