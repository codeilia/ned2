<?php

namespace App\Http\Controllers;

use App\Nedsa\Constants;
use App\Response\MessageResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSoldierForm;
use App\Http\Requests\UpdateSoldierForm;
use App\Models\Soldier;

class SoldiersController extends Controller
{
    public function __construct()
    {
        $this->middleware('convertToGreg:soldier')->only('store', 'update');

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $soldiers = Soldier::with(
            'martialInfo',
            'leaveInfo',
            'leaves',
            'extraDuties',
            'extraDuties',
            'absences',
            'shortages'
        )->latest()->get();

        return view('app.soldiers.index', compact('soldiers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.soldiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSoldierForm $form
     * @return mixed
     */
    public function store(CreateSoldierForm $form)
    {
        $soldier = $form->persist()->result();

        return MessageResponse::respondSuccess('سرباز با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soldier  $soldier
     * @return \Illuminate\Http\Response
     */
    public function show(Soldier $soldier)
    {
        $soldier->load([
            'martialInfo',
            'leaveInfo',
            'leaves',
            'extraDuties',
            'extraDuties',
            'absences',
            'shortages'
        ]);

        return $this->respondWithData($soldier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Soldier $soldier
     * @return \Illuminate\Http\Response
     */
    public function edit(Soldier $soldier)
    {
        return view('app.soldiers.edit', compact('soldier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSoldierForm $form
     * @return mixed
     */
    public function update(UpdateSoldierForm $form)
    {
        $soldier = $form->persist()->result();

        return MessageResponse::respondSuccess('اطلاعات سرباز با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soldier $soldier
     * @return void
     */
    public function destroy(Soldier $soldier)
    {
        $this->respondNotFound();
    }
}
