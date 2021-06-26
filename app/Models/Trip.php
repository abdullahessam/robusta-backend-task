<?php

namespace App\Models;

use App\relations\TripsHasCities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Trip
 *
 * @property int $id
 * @property int $line_id
 * @property int $bus_id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bus $bus
 * @property-read \App\Models\Line $line
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Trip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereBusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereLineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Trip extends Model
{
    protected $fillable=['line_id', 'bus_id', 'date'];
    use HasFactory;

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function reservations()
    {
        return  $this->hasMany(Reservation::class);
    }

    public function cities()
    {
        return new TripsHasCities(City::query(),$this);
    }

    public function scopeAvailableDate($query,$from, $to)
    {
        $query->whereHas('trips',function ($q)use ($from,$to){
            $q->whereBetween('date',[$from,$to]);
        });
    }
    public function scopeAvailableCities($query,$dispatch, $destination)
    {
        $query->whereHas('cities',function ($query)use($dispatch){
            $query->where('cities.id',$dispatch);
        })->whereHas('cities',function ($query)use($destination){
            $query->where('cities.id',$destination);
        });
    }

}
