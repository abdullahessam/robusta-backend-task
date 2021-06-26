<?php


namespace App\relations;


use App\Models\City;
use App\Models\Reservation;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;

class TripsHasCities  extends Relation
{
    public function __construct(Builder $query, Trip $trip)
    {
//        $this->column_name = $column_name;
        parent::__construct($query, $trip);
    }

    public function addConstraints()
    {

        return $this->query
            ->leftjoin("line_cities", 'line_cities.city_id', '=', 'cities.id')
            ->leftjoin("lines", 'lines.id', '=', 'line_cities.line_id')
            ->leftJoin('trips', 'lines.id', '=', 'trips.line_id')
            ->distinct()
            ->select('cities.*', 'line_cities.order');
    }

    public function addEagerConstraints(array $models)
    {
        $this->query->whereIn('line_cities.line_id', collect($models)->pluck('line_id'));
    }

    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation(
                $relation,
                $this->related->newCollection()
            );
        }
        return $models;
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
                    return $model->line->cities->pluck('id')->contains($city->id);
                })
            );
        }
        return $models;
    }

    public function getExistenceCompareKey()
    {
        return 'id' ;
    }

    public function getResults()
    {
        $this->query->whereIn('cities.id', $this->parent->line->cities->pluck('id'))->get();
    }
    public function get($columns = ['*'])
    {
        return $this->query->whereIn('cities.id', $this->parent->line->cities->pluck('id'))->get($columns);
    }
}
