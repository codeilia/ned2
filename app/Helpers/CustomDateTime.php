<?php

namespace App\Helpers;

use App\Repositories\JdfRepository;
use Date\Date;
use Date\Jalali;

class CustomDateTime
{

    public static function toGreg($date, $divider = null){
        $date = trim($date, 'PM');
        $date = trim($date, 'AM');
        $date  = new jalali($date);
        $date = $date->toGregorian();

        if (isset($divider))
            $date = str_replace('/', $divider, $date);
        else
            $date = str_replace('/', '-', $date);

        $date = preg_replace("/(.+)\s(.*)/", "$1", $date);

        return $date;
    }

    public static function toJalali2($date)
    {
        $jdf = new JdfRepository();

        return $jdf->date('Y-m-d', $date);
    }

    public static function toJalali($date){
        $date = new Date($date);
        $date = $date->toJalali();
        $date = preg_replace('/(.*) \d\d:\d\d:\d\d/', '$1', $date);
        return $date;
    }

    public static function days($dateTime1, $dateTime2)
    {
        return (static::diffInHours($dateTime1, $dateTime2) / 2) / 24;
    }

    public static function nights($dateTime1, $dateTime2)
    {
        return (static::diffInHours($dateTime1, $dateTime2) / 2) / 24;
    }

    public static function diffInHours($dateTime1, $dateTime2)
    {
        $dateTime1 = new Date($dateTime1);
        $dateTime2 = new Date($dateTime2);
        return $dateTime1->diffInHours($dateTime2);
    }
}