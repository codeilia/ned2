<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Helpers\CustomDateTime;
use App\Models\TrainTicket;

class CreateTrainTicketStrategy
{
    public function handle($request)
    {
        $trainTicket = TrainTicket::create([
            'type' => $request->type,
            'revoked' => $request->revoked,
            'flight_number' => $request->flight_number,
            'ticket_number' => $request->ticket_number,
            'from' => $request->from,
            'to' => $request->to,
            'going_date' => CustomDateTime::toGreg($request->going_date),
            'return_date' => CustomDateTime::toGreg($request->return_date),
        ]);

        return $trainTicket;
    }
}