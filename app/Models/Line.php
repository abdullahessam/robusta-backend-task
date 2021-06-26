<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Line
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Trip[] $trips
 * @property-read int|null $trips_count
 * @method static \Illuminate\Database\Eloquent\Builder|Line newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Line newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Line query()
 * @method static \Illuminate\Database\Eloquent\Builder|Line whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Line whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Line whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Line whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LineCity[] $line_cities
 * @property-read int|null $line_cities_count
 */
class Line extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->belongsToMany(City::class, LineCity::class)->withPivot('order');
    }

    public function line_cities()
    {
        return $this->hasMany(LineCity::class);
    }

    public function getCityOrder($city)
    {
       return $this->cities->find($city)->pivot->order;
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function scopeAvailableDates($query, $from, $to)
    {
        $query->whereHas('trips', function ($q) use ($from, $to) {
            $q->where('date', '>=', $from)->where('date', '<=', $to);
        });
    }

    public function scopeAvailableCities($query, $dispatch, $destination)
    {
        $query->whereHas('cities', function ($query) use ($dispatch) {
            $query->where('cities.id', $dispatch);
        })->whereHas('cities', function ($query) use ($destination) {
            $query->where('cities.id', $destination);
        });
    }

    public function scopeHasValidTrip($query, $request)
    {
        $query->availableDates($request['date_from'], $request['date_to'])->availableCities($request['dispatch_city_id'], $request['destination_city_id']);
    }
}
