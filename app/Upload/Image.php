<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 21/01/2018
 * Time: 02:41 PM
 */

namespace App\Store;


use App\Contracts\Uploadable;
use Illuminate\Support\Facades\Storage;

class Image extends Uploadable
{
    public function publicUpload()
    {
        return Storage::disk('public')->put('image', $this->request);
    }

    public function privateUpload()
    {
        // TODO: Implement privateUpload() method.
    }
}