<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeaveForm;
use App\Http\Requests\UpdateLeaveForm;
use App\Models\Leave;
use App\Models\Soldier;
use App\Nedsa\Constants;
use App\Response\MessageResponse;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    public function __construct()
    {
        $this->middleware('convertToGreg:leave')->only('store', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return  $leaves
     */
    public function index(Request $request)
    {
        $leaves = Leave::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->paginate(Constants::PAGINATE_LIMIT);

        return view('app.leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $selectedSoldier = Soldier::find($request->soldier);
        $selectedSoldier = empty($selectedSoldier) ? '' : $selectedSoldier->id;

        $soldiers = Soldier::get();

        return view('app.leaves.create', compact('soldiers', 'selectedSoldier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLeaveForm $form
     * @return mixed
     */
    public function store(CreateLeaveForm $form)
    {
        $leave = $form->persist()->result();

        return MessageResponse::respondSuccess('اطالاعات مرخصی سرباز مورد نظر با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        return view('app.leaves.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLeaveForm $form
     * @return mixed
     */
    public function update(UpdateLeaveForm $form)
    {
        $leave = $form->persist()->result();
        return MessageResponse::respondSuccess('اطلاعات مرخصی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave $leave
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return MessageResponse::respondSuccess('مرخصی مورد نظر حذف شد');
    }
}
