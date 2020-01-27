<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 06/08/2018
 * Time: 10:01 AM
 */

namespace App\Strategies;


use App\Models\Translation;

class CreateTranslationStrategy
{
    public function handle($request)
    {
        $translation = Translation::create([]);

        return $translation;
    }
}