<?php

namespace App\Listeners;

use App\Models\Branch;
use App\Models\BranchSaleStat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateBranchSaleStat
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
        $branch = Branch::findOrFail($event->sale->branch_id);


        $purchaseAmount = (int) $event->sale->purchase_amount;
        $sellingAmount = (int) $event->sale->selling_amount;
        $discount = (int) $event->sale->discount_amount;

        if ($branch->hasSaleStat()) {
            $saleStat = $branch->saleStat()->first();

            $saleStat->purchase_amount += $purchaseAmount;
            $saleStat->selling_amount += $sellingAmount;
            $saleStat->profit += ($sellingAmount - $purchaseAmount - $discount);
            $saleStat->save();
        } else {
            $branch->saleStat()->create([
                'purchase_amount' => $purchaseAmount,
                'selling_amount' => $sellingAmount,
                'profit' => $sellingAmount - $purchaseAmount - $discount,
            ]);
        }
    }
}
