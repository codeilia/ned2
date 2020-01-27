<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAbsenceForm;
use App\Http\Requests\UpdateAbsenceForm;
use App\Models\Absence;
use App\Models\Soldier;
use App\Nedsa\Constants;
use App\Response\MessageResponse;
use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $absences = Absence::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->paginate(Constants::PAGINATE_LIMIT);

        return view('app.absences.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $soldiers = Soldier::get();
        $selectedSoldier = isset($request->soldier) ? Soldier::find($request->soldier)->id : null;
        return view('app.absences.create', compact('soldiers', 'selectedSoldier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAbsenceForm $form
     * @return mixed
     */
    public function store(CreateAbsenceForm $form)
    {
        $absence = $form->persist()->result();

        return MessageResponse::respondSuccess('غیبت با موفقیت برای سرباز مورد نظر ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        return view('app.absences.edit', compact('absence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAbsenceForm $form
     * @return mixed
     */
    public function update(UpdateAbsenceForm $form)
    {
        $absence = $form->persist()->result();

        return MessageResponse::respondSuccess('اطلاعات غیبت مورد نظر با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence $absence
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();

        return MessageResponse::respondSuccess('غیبت مورد نظر با موفقیت حذف شد');
    }
}
