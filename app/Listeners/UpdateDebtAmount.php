<?php

namespace App\Listeners;

use App\Models\Provider;
use App\Models\TradeBalance;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;

class UpdateDebtAmount
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
        $tradeBalance = TradeBalance::findOrFail($event->providerId);

        Redis::decrBy('totalPurchasedAmount', $tradeBalance->purchase_amount);
        Redis::decrBy('totalUnpaidAmount', $tradeBalance->unpaid_amount);

        Redis::incrBy('totalPurchasedAmount', $event->purchaseAmount);
        Redis::incrBy('totalUnpaidAmount', $event->purchaseAmount);

        $tradeBalance->purchase_amount -= $tradeBalance->purchase_amount;
        $tradeBalance->unpaid_amount -= $tradeBalance->unpaid_amount;

        $tradeBalance->purchase_amount += $event->purchaseAmount;
        $tradeBalance->unpaid_amount += $event->purchaseAmount;

        $tradeBalance->save();

    }
}
