<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;

class IncreaseSaleCount
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
        $sale = $event->sale;

        if ($sale->salable_type == 'airplaneTicket') {
            Redis::incrBy('airplaneTicketsCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.airplaneTicketsCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.airplaneTicketsCount", 1);
        }

        if ($sale->salable_type == 'trainTicket') {
            Redis::incrBy('trainTicketsCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.trainTicketsCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.trainTicketsCount", 1);
        }

        if ($sale->salable_type == 'package') {
            Redis::incrBy('packagesCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.packagesCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.packagesCount", 1);
        }

        if ($sale->salable_type == 'visaService') {
            Redis::incrBy('visaServicesCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.visaServicesCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.visaServicesCount", 1);
        }

        if ($sale->salable_type == 'passengerInsurance') {
            Redis::incrBy('passengerInsurancesCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.passengerInsurancesCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.passengerInsurancesCount", 1);
        }

        if ($sale->salable_type == 'pickup') {
            Redis::incrBy('pickupsCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.pickupsCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.pickupsCount", 1);
        }

        if ($sale->salable_type == 'hotel') {
            Redis::incrBy('hotelsCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.hotelsCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.hotelsCount", 1);
        }


        if ($sale->salable_type == 'translation') {
            Redis::incrBy('translationsCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.translationsCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.translationsCount", 1);
        }

        if ($sale->salable_type == 'transfer') {
            Redis::incrBy('transfersCount', 1);
            Redis::incrBy("branch.{$sale->branch->id}.transfersCount", 1);
            Redis::incrBy("counter.{$sale->counter->id}.transfersCount", 1);
        }


        Redis::incrBy('allSalesCount', 1);
        Redis::incrBy("branch.{$sale->branch->id}.salesCount", 1);
        Redis::incrBy("counter.{$sale->counter->id}.salesCount", 1);
    }
}
