<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\BusDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Bus\StoreRequest;
use App\Http\Requests\Dashboard\Bus\UpdateRequest;
use App\Models\Bus;

class BusController extends Controller
{
    public function index(BusDataTable $dataTable)
    {
        return $dataTable->render('dashboard.buses.index');
    }

    public function create()
    {
        return view('dashboard.buses.create');
    }
    public function edit(Bus $bus)
    {
        return view('dashboard.buses.edit')->with('bus',$bus);
    }
    public function store(StoreRequest $request)
    {
        Bus::create($request->validated());
        alert()->success('bus added successfully');
        return back();
    }
    public function update(UpdateRequest $request,Bus $bus)
    {
        $bus->update($request->validated());
        alert()->success('bus edited successfully');
        return back();
    }

    public function destroy(Bus $bus)
    {
        if ($bus->trips()->exists()) {
            alert()->error('you can not delete this bus because it has lines');
            return back();
        }
        $bus->delete();
        alert()->success('bus deleted successfully !');
        return back();
    }
}
