<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LineCity
 *
 * @property int $id
 * @property int $city_id
 * @property int $line_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity whereLineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineCity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LineCity extends Model
{
    use HasFactory;
}
