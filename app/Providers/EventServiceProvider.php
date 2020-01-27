<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\SaleRegistered' => [
            'App\Listeners\IncreaseDebtAmount',
            'App\Listeners\UpdateBranchSaleStat',
            'App\Listeners\UpdateCounterSaleStat',
            'App\Listeners\IncreaseSaleCount',
        ],
        'App\Events\SaleUpdated' => [
            'App\Listeners\UpdateDebtAmount',
        ],
        'App\Events\SaleApproved' => [
            'App\Listeners\UpdateDebtAmount',
        ],
        'App\Events\SaleRejected' => [
            'App\Listeners\IncreaseRejectedSalesCount',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
