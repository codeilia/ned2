<?php

namespace App\Http\Controllers;

use App\Nedsa\Constants;
use App\Response\MessageResponse;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSoldierForm;
use App\Http\Requests\UpdateSoldierForm;
use App\Models\Soldier;
use Illuminate\Support\Facades\Storage;

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
        )->where('archive', 0)->latest()->get();

        return view('app.soldiers.index', compact('soldiers'));
    }


    public function archives(Request $request)
    {
        $soldiers = Soldier::with(
            'martialInfo',
            'leaveInfo',
            'leaves',
            'extraDuties',
            'extraDuties',
            'absences',
            'shortages'
        )->where('archive', 1)->latest()->get();

        return view('app.archives.index', compact('soldiers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        foreach (range(1, 400) as $item) {
            $soldier = Soldier::where('archive', false)-> where('document_code', $item)->first();
            if (empty($soldier)) {
                $nonReservedCodes[] = $item;
            }
        };

        return view('app.soldiers.create', compact('nonReservedCodes'));
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
        foreach (range(1, 400) as $item) {
            $soldier = Soldier::where('archive', false)-> where('document_code', $item)->first();
            if (empty($soldier)) {
                $nonReservedCodes[] = $item;
            }
        };

        return view('app.soldiers.edit', compact('soldier', 'nonReservedCodes'));
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

    public function archiveForm(Soldier $soldier, Request $request)
    {
        return view('app.soldiers.archive', compact('soldier'));
    }

    public function archive(Soldier $soldier, Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file')->storePublicly('documents', ['disk' => 'public']);
        } else {
            $file = '';
        }


        $soldier->update([
            'document_code' => null,
            'archive' => true,
            'archive_number' => $request->archive_number,
            'file' => $file
        ]);

        return MessageResponse::respondSuccess('پرونده سرباز با موفقیت بایگانی شد');
    }

    public function estelam(Soldier $soldier, Request $request)
    {
        $totalVoid = $soldier->extraDuties()->sum('void_duty');
        $totalAbsences = $soldier->absences()->sum('days');
        $totalExtraDuty = $soldier->extraDuties()->sum('days');
        $totalShortages = $soldier->shortages()->sum('days');

//        dd($soldier->martialInfo->sent_date);

        $soldier->load([
            'martialInfo',
            'leaveInfo',
            'leaves',
            'extraDuties',
            'extraDuties',
            'absences',
            'shortages'
        ]);

        return view('app.soldiers.estelam', compact('soldier',
            'totalExtraDuty',
            'totalShortages',
            'totalVoid',
            'totalDeservedLeaves',
            'totalBonusLeaves',
            'totalBonusLeaves',
            'totalEstelajiLeaves',
            'totalEmergencyLeaves',
            'remainedDeservedLeaves',
            'remainedEmergencyLeaves',
            'remainedEstelajiLeaves',
            'remainedBonusLeaves',
            'totalAbsences'
        ));
    }
}
