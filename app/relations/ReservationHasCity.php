<?php


namespace App\relations;


use App\Models\City;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;

class ReservationHasCity extends Relation
{

    protected $column_name;

    public function __construct(Builder $query, Reservation $reservation)
    {
        parent::__construct($query, $reservation);
    }

    public function getExistenceCompareKey()
    {
        return 'cities.id';
    }

    /**
     * Add the constraints for an internal relationship existence query.
     *
     * Essentially, these queries compare on column names like whereColumn.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Builder  $parentQuery
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        return $query->leftjoin("line_cities", 'line_cities.city_id', '=', 'cities.id')
            ->select($columns)->whereColumn(
            $this->getQualifiedParentKeyName(), '=', $this->getExistenceCompareKey()
        );
    }

    public function addConstraints()
    {
        return $this->query
            ->leftjoin("line_cities", 'line_cities.city_id', '=', 'cities.id')
            ->leftjoin("lines", 'lines.id', '=', 'line_cities.line_id')
            ->leftJoin('trips', 'lines.id', '=', 'trips.line_id')
            ->leftjoin("reservations", 'reservations.trip_id', '=', 'trips.id')
            ->distinct()
            ->select('cities.*', 'line_cities.order');
    }

    public function addEagerConstraints(array $models)
    {
        $this->query->whereIn('trips.id', collect($models)->pluck('trip_id'));
    }

    public function initRelation(array $reservations, $relation)
    {
        foreach ($reservations as $reservation) {

            $reservation->setRelation(
                $relation,
                $this->related->newCollection()
            );
        }
        return $reservations;
    }

    public function match(array $models, Collection $results, $relation)
    {

        if ($results->isEmpty()) {
            return $models;
        }
        foreach ($models as $model) {
            $model->setRelation(
                $relation,
                $results->filter(function (City $city) use ($model) {
                    return $city->lines->contains($model->trip->line->id);
                })
            );
        }
        return $models;
    }

    public function getResults()
    {
        return $this->query->where('lines.id',$this->parent->trip->line_id)->get();
    }

}
