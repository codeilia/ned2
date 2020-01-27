<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 21/01/2018
 * Time: 03:30 PM
 */

namespace App\Contracts;


use Illuminate\Support\Facades\Storage;

abstract class Uploadable
{
    protected $request;

    /**
     * Uploadable constructor.
     * @param $request
     */
    function __construct($request)
    {
        $this->request = $request;
    }

    public function publicUpload()
    {
        return Storage::disk('public')->put('default', $this->request);
    }

    public function privateUpload()
    {
        return Storage::disk('private')->put('default', $this->request);
    }
}