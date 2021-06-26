<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\LineDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Line\StoreRequest;
use App\Http\Requests\Dashboard\Line\UpdateRequest;
use App\Models\Line;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LineDataTable $dataTable)
    {
        return $dataTable->render('dashboard.lines.index');
    }

    public function show(Line $line)
    {
        return view('dashboard.lines.cities')->with('line',$line);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Line::create($request->validated());
        alert()->success('line added successfully !');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Line $line)
    {
        return view('dashboard.lines.edit')->with('line', $line);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Line $line)
    {
        $line->update($request->validated());

        alert()->success('line edited successfully !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Line $line)
    {
        if ($line->cities()->exists()) {
            alert()->error('you can not delete this line because it has childs');
            return back();
        }
        $line->delete();
        alert()->success('line deleted successfully !');
        return back();
    }
}
