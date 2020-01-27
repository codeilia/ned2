<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExtraDutyForm;
use App\Http\Requests\UpdateExtraDutyForm;
use App\Models\ExtraDuty;
use App\Models\Soldier;
use App\Nedsa\Constants;
use App\Response\MessageResponse;
use Illuminate\Http\Request;

class ExtraDutiesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $extraDuties = ExtraDuty::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->paginate(Constants::PAGINATE_LIMIT);

        return view('app.extra-duties.index', compact('extraDuties'));
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

        return view('app.extra-duties.create', compact('soldiers', 'selectedSoldier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateExtraDutyForm $form
     * @return mixed
     */
    public function store(CreateExtraDutyForm $form)
    {
        $extraDuty = $form->persist()->result();

        return MessageResponse::respondSuccess('اضافه خدمت با موفقیت برای سرباز مورد نظر ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExtraDuty  $extraDuty
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraDuty $extraDuty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExtraDuty  $extraDuty
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtraDuty $extraDuty)
    {
        return view('app.extra-duties.edit', compact('extraDuty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateExtraDutyForm $form
     * @return mixed
     */
    public function update(UpdateExtraDutyForm $form)
    {
        $extraDuty = $form->persist()->result();

        return MessageResponse::respondSuccess('اطلاعات اضافه خدمت مورد نظر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExtraDuty $extraDuty
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ExtraDuty $extraDuty)
    {
        $extraDuty->delete();

        return MessageResponse::respondSuccess('اضافه خدمت مورد نظر با موفقیت حذف شد');
    }
}
