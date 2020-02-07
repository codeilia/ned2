<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use App\Models\VoidDuty;
use App\Nedsa\Constants;
use Illuminate\Http\Request;

class VoidDutiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leaves = VoidDuty::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->paginate(Constants::PAGINATE_LIMIT);

        return view('app.leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selectedSoldier = Soldier::find($request->soldier);
        $selectedSoldier = empty($selectedSoldier) ? '' : $selectedSoldier->id;

        $soldiers = Soldier::get();

        return view('app.void.create', compact('soldiers', 'selectedSoldier'));
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
     * @param  \App\VoidDuty  $voidDuty
     * @return \Illuminate\Http\Response
     */
    public function show(VoidDuty $voidDuty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoidDuty  $voidDuty
     * @return \Illuminate\Http\Response
     */
    public function edit(VoidDuty $voidDuty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoidDuty  $voidDuty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoidDuty $voidDuty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoidDuty  $voidDuty
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoidDuty $voidDuty)
    {
        //
    }
}
