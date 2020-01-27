<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 21/01/2018
 * Time: 02:40 PM
 */

namespace App;


use App\Contracts\Uploadable;

class Store
{
    public static function publicUpload(Uploadable $file)
    {
        return $file->publicUpload();
    }

    public static function privateUpload(Uploadable $file)
    {
        return $file->privateUpload();
    }

    // api => Store::publicStorage()->image($request);
    //        Store::publicStorage(new ImageFile($request);
    //        Store::publicUpload(new Image());
}