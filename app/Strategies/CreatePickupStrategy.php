<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Models\Pickup;

class CreatePickupStrategy
{
    public function handle($request)
    {
        $pickup = Pickup::create([
            'country' => $request->country,
        ]);

        return $pickup;
    }
}