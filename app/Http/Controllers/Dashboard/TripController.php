<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\TripDataTable;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Trip\StoreRequest;
use App\Http\Requests\Dashboard\Trip\UpdateRequest;
use App\Models\Bus;
use App\Models\Line;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TripDataTable $dataTable)
    {
        return  $dataTable->render('dashboard.trips.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses=Bus::pluck('name','id');
        $lines=Line::pluck('name','id');
        return  view('dashboard.trips.create')->with('buses',$buses)->with('lines',$lines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Trip::create($request->validated());
        alert()->success('trip created successfully !');
        return  back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        $buses=Bus::pluck('name','id');
        $lines=Line::pluck('name','id');
        return  view('dashboard.trips.edit')->with([
            'trip'=>$trip,
            'buses'=>$buses,
            'lines'=>$lines
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Trip $trip)
    {
        $trip->update($request->validated());
        alert()->success('trip updated successfully !');
        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        if ($trip->reservations()->exists()){
            alert()->error('cannot delete trips because there is reservations ');
            return  back();
        }
        $trip->delete();
        alert()->success('trip created successfully !');
        return  back();
    }
}
