<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;
use App\Models\City;

class CityController extends Controller
{
    public function index(CityDataTable $dataTable)
    {
        return $dataTable->render('dashboard.cities.index');
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
