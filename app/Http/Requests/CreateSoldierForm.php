<?php

namespace App\Http\Requests;

use App\Models\Soldier;
use App\Vamyar\Contracts\ResponsiveFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateSoldierForm extends ResponsiveFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function persist()
    {
        $inputs = request()->all();
        $inputs['married'] = !! request('married');
        $soldier = Soldier::create($inputs);
        $this->result = $soldier;
        return $this;
    }
}
