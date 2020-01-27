<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Models\Transfer;

class CreateTransferStrategy
{
    public function handle($request)
    {
        $transfer = Transfer::create([]);

        return $transfer;
    }
}