<?php

namespace App\Listeners;

use App\Models\Provider;
use App\Models\TradeBalance;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;

class IncreaseDebtAmount
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
        $provider = Provider::findOrFail($event->providerId);

        if ($provider->hasTradeBalance()) {
            $tradeBalance = $provider->tradeBalance()->first();

            $tradeBalance->purchase_amount += $event->purchaseAmount;
            $tradeBalance->unpaid_amount += $event->purchaseAmount;
        } else {
            $tradeBalance = TradeBalance::create([
                'provider_id' => $event->providerId,
                'purchase_amount' => $event->purchaseAmount,
                'unpaid_amount' => $event->purchaseAmount,
            ]);
        }

        Redis::incrBy('totalPurchasedAmount', $event->purchaseAmount);
        Redis::incrBy('totalUnpaidAmount', $event->purchaseAmount);
    }
}
