<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\City\StoreRequest;
use App\Http\Requests\Dashboard\City\UpdateRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index(CityDataTable $dataTable)
    {
        return $dataTable->render('dashboard.cities.index');
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }
    public function edit(City $city)
    {
        return view('dashboard.cities.edit')->with('city',$city);
    }
    public function store(StoreRequest $request)
    {
        City::create($request->validated());
        alert()->success('city added successfully');
        return back();
    }
    public function update(UpdateRequest $request,City $city)
    {
        $city->update($request->validated());
        alert()->success('city edited successfully');
        return back();
    }

    public function destroy(City $city)
    {
        if ($city->lines()->exists()) {
            alert()->error('you can not delete this city because it has lines');
            return back();
        }
        $city->delete();
        alert()->success('city deleted successfully !');
        return back();
    }
}
