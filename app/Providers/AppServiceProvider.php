<?php

namespace App\Providers;

use App\Models\AirplaneTicket;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\PartnerAgencyPackage;
use App\Models\PassengerInsurance;
use App\Models\Pickup;
use App\Models\ProviderPayment;
use App\Models\TradeBalance;
use App\Models\TrainTicket;
use App\Models\Transfer;
use App\Models\Translation;
use App\Models\VisaService;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('app.forms.visa-service.blade.php', function ($view) {
            $countries = Country::get();
            return $countries;
        });

        Paginator::defaultView('pagination::default');

        Paginator::defaultSimpleView('pagination::default');

        Relation::morphMap([
            'airplaneTicket' => AirplaneTicket::class,
            'trainTicket' => TrainTicket::class,
            'package' => PartnerAgencyPackage::class,
            'visaService' => VisaService::class,
            'passengerInsurance' => PassengerInsurance::class,
            'pickup' => Pickup::class,
            'hotel' => Hotel::class,
            'translation' => Translation::class,
            'transfer' => Transfer::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
