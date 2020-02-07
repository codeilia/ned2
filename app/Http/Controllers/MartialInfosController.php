<?php

namespace App\Http\Controllers;

use App\Models\MartialInfo;
use App\Models\Soldier;
use App\Models\Unit;
use App\Response\MessageResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MartialInfosController extends Controller
{
    public function __construct()
    {
        $this->middleware('convertToGreg:martialInfo')->only('store', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\MartialInfo  $martialInfo
     * @return \Illuminate\Http\Response
     */
    public function show(MartialInfo $martialInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Soldier $soldier
     * @return \Illuminate\Http\Response
     */
    public function edit(Soldier $soldier)
    {
        $soldier->load('martialInfo');
        $selectedUnit = $soldier->martialInfo ? $soldier->martialInfo->unit->id : null;
        $units = Unit::get();
        return view('app.martial-infos.edit', compact('soldier', 'units', 'selectedUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Soldier $soldier
     * @return Soldier
     */
    public function update(Request $request, Soldier $soldier)
    {
        $endDate = Carbon::parse($request->sent_date)->addMonth($request->legal_duty_time);

        $request->offsetSet('native', !! $request->native);
        $request->offsetSet('green_card', !! $request->green_card);
        $request->offsetSet('end_date',  $endDate);

        MartialInfo::updateOrCreate(
            ['soldier_id' => $soldier->id],
            $request->except('soldier')
        );

        return MessageResponse::respondSuccess('اطلاعات نظامی با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MartialInfo  $martialInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MartialInfo $martialInfo)
    {
        //
    }
}
