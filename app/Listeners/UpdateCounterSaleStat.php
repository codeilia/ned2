<?php

namespace App\Listeners;

use App\Models\Branch;
use App\Models\BranchSaleStat;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateCounterSaleStat
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $counter = User::findOrFail($event->sale->user_id);

        $purchaseAmount = $event->sale->purchase_amount;
        $sellingAmount = $event->sale->selling_amount;
        $discount = (int) $event->sale->discount_amount;


        if ($counter->hasSaleStat()) {
            $saleStat = $counter->saleStat()->first();

            $saleStat->purchase_amount += $purchaseAmount;
            $saleStat->selling_amount += $sellingAmount;
            $saleStat->profit += ($sellingAmount - $purchaseAmount - $discount);
            $saleStat->save();
        } else {
            $counter->saleStat()->create([
                'purchase_amount' => $purchaseAmount,
                'selling_amount' => $sellingAmount,
                'profit' => $sellingAmount - $purchaseAmount - $discount,
            ]);
        }
    }
}
