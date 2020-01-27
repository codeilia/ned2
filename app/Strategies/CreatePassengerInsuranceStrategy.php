<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Models\PassengerInsurance;

class CreatePassengerInsuranceStrategy
{
    public function handle($request)
    {
        $passengerInsurance = PassengerInsurance::create([
            'country' => $request->country,
            'insurance_number' => $request->insurance_number
        ]);

        return $passengerInsurance;
    }
}