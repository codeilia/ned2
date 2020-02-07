<?php

namespace App\Http\Controllers;

use App\Helpers\CustomDateTime;
use App\Models\Shortage;
use App\Models\Soldier;
use App\Nedsa\Constants;
use App\Response\MessageResponse;
use Illuminate\Http\Request;

class ShortagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shortages = Shortage::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->paginate(Constants::PAGINATE_LIMIT);

        return view('app.shortages.index', compact('shortages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $selectedSoldier = Soldier::where('id', $request->soldier)->first();
        $selectedSoldier = empty($selectedSoldier) ? '' : $selectedSoldier->id;

        $soldiers = Soldier::get();

        return view('app.shortages.create', compact('soldiers', 'selectedSoldier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $soldier = Soldier::findOrFail($request->soldier);
        $request->offsetSet('date', CustomDateTime::toGreg($request->date));
//        dd($request->all());
        $shortage = $soldier->shortages()->create($request->except('soldier', 'birthday'));
        return MessageResponse::respondSuccess('اطلاعات کسری با موفقیت برای سرباز مورد نظر ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shortage  $shortage
     * @return \Illuminate\Http\Response
     */
    public function show(Shortage $shortage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shortage  $shortage
     * @return \Illuminate\Http\Response
     */
    public function edit(Shortage $shortage)
    {
        return view('app.shortages.edit', compact('shortage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shortage  $shortage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shortage $shortage)
    {
        $request->merge(['date', CustomDateTime::toGreg($request->date)]);
        $shortage->update($request->all());
        return MessageResponse::respondSuccess('اطلاعات کسری با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shortage $shortage
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Shortage $shortage)
    {
        $shortage->delete();
        return MessageResponse::respondSuccess('کسری مورد نظر حذف شد');
    }
}
