<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Models\PartnerAgencyPackage;

class CreatePackageStrategy
{
    public function handle($request)
    {
        $partnerAgencyPackage = PartnerAgencyPackage::create([
            'country' => $request->country
        ]);

        return $partnerAgencyPackage;
    }
}