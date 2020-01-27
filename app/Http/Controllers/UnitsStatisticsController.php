<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitsStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unit = Unit::find($request->unit);
        $soldiers = Soldier::with([
            'leaves',
            'martialInfo.unit',
            'martialInfo',
            'leaveInfo',
            'extraDuties',
            'voidDuties',
            'absences',
            'shortages'
        ])->whereHas('martialInfo.unit', function ($query) use ($unit) {
            return $query->where('unit_id', $unit->id);
        })->get();

        //TODO:: I stubbed here. should be changed later
        $columns = [
            'first_name',
            'last_name',
            'national_code',
            'educations',
            'married',
            'province',
            'living_city',
            'start_date',
            'end_date',
        ];
//        $columns = array_keys($request->except('_token', 'unit'));
//        dd($columns);

        $count = $unit->martialInfos()->count();

        return view('app.statistics.units', compact('soldiers', 'count', 'unit', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
