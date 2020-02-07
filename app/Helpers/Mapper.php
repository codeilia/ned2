<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 24/01/2020
 * Time: 08:14 PM
 */

namespace App\Helpers;


class Mapper
{
    public static function mapLeave($code)
    {
        if ($code == 1)
            return 'استحقاقی';

        if ($code == 2)
            return 'تشویقی';

        if ($code == 3)
            return 'فوت والدین';

        if ($code == 4)
            return 'تاهل';

        if ($code == 5)
            return 'توراهی';

        if ($code == 6)
            return 'استعلاجی';

        if ($code == 7)
            return 'اظطراری';

        if ($code == 8)
            return 'تشویقی خارج از سقف';
    }
}