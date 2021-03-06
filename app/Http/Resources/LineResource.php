<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return  [
          'id'=>$this->id,
          'name'=>$this->name,
          'cities'=>CityResource::collection($this->cities),
          'trips'=>TripResource::collection($this->trips)
      ];
    }
}
