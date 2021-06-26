<?php

 function getAvailableTickets($bookedTickets){
     $bus_seats=12;
   return  array_diff(range(1, 12), $bookedTickets->pluck('seat_no')->toArray());
 }

 function removeUnSportedCitiesOnLine(&$lines,$request){
     foreach ($lines as $key=> $line) {
         // to remove unsupported line's city direction
         $dispatch_city=$line->cities->where('id',$request->dispatch_city_id)->first();
         $destination_city=$line->cities->where('id',$request->destination_city_id)->first();
         if ($dispatch_city->pivot->order >= $destination_city->pivot->order){
             $lines->forget($key);
         }
     }
     throw_unless($lines,\Illuminate\Validation\ValidationException::withMessages(['there is no available trips at this time !']));
     return $lines;
 }

 function validateAvailableSeatNo($trip,$seat_no,$dispatch_city_order, $destination_city_order){
     $bookedTickets=$trip->reservations()->bookedTickets($trip->line,$dispatch_city_order,$destination_city_order);
     $availableTickets=getAvailableTickets($bookedTickets);
     throw_unless(in_array($seat_no,$availableTickets),Illuminate\Validation\ValidationException::withMessages(['the seat is not available for this trip please chose anther seat !']));
 }
