<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Helpers\CustomDateTime;
use App\Models\AirplaneTicket;

class CreateAirplaneTicketStrategy
{
    public function handle($request)
    {
        $airplaneTicket = AirplaneTicket::create([
            'type' => $request->type,
            'revoked' => $request->revoked,
            'flight_number' => $request->flight_number,
            'airline' => $request->airline,
            'reference_number' => $request->reference_number,
            'ticket_number' => $request->ticket_number,
            'from_country' => $request->from_country,
            'from_city' => $request->from_city,
            'to_country' => $request->to_country,
            'to_city' => $request->to_city,
            'going_date' => CustomDateTime::toGreg($request->going_date),
            'return_date' => CustomDateTime::toGreg($request->return_date),
        ]);

        return $airplaneTicket;
    }
}