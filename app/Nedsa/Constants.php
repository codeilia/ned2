<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 08/01/2020
 * Time: 09:54 PM
 */

namespace App\Nedsa;


class Constants
{
    const PAGINATE_LIMIT = 10;
    const LEAVE_TYPE = [
        'DESERVED_LEAVE' => [
            'name' => 'استحقاقی',
            'code' => 1,
        ],
        'BONUS_LEAVE' => [
            'name' => 'تشویقی',
            'code' => 2,
        ],
        'PARENTS_DIE_LEAVE' => [
            'name' => 'فوت والدین',
            'code' => 3,
        ],
        'MARRIAGE_LEAVE' => [
            'name' => 'تاهل',
            'code' => 4,
        ],
        'TORAHI' => [
            'name' => 'توراهی',
            'code' => 5,
        ],
    ];
}