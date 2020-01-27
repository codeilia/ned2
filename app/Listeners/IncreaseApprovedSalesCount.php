<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;

class IncreaseApprovedSalesCount
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

        Redis::incrBy('approvedSalesCount', 1);
        Redis::incrBy("branch.{$sale->branch->id}.approvedSalesCount", 1);
        Redis::incrBy("counter.{$sale->counter->id}.approvedSalesCount", 1);
    }
}
