<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Models\VisaService;

class CreateVisaServiceStrategy
{
    public function handle($request)
    {
        $visaService = VisaService::create([
            'country' => $request->country,
            'visa_type' => $request->visa_type
        ]);

        return $visaService;
    }
}