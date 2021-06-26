<?php

namespace App\Http\Resources;

use App\Models\Trip;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TripResource
 * @package App\Http\Resources
 * @mixin Trip
 */
class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        // get order of cities on the tip line to check the available seats
        $dispatch_city_order = $this->line->getCityOrder($request->dispatch_city_id);
        $destination_city_order = $this->line->getCityOrder($request->destination_city_id);

        $bookedTickets = $this->reservations()->bookedTickets($this->line,$dispatch_city_order,$destination_city_order);
        return [
            'id'=>$this->id,
            'bus'=>new BusResource($this->bus),
            'date'=>$this->date,
            'available_seats' =>getAvailableTickets($bookedTickets)
        ];
    }
}
