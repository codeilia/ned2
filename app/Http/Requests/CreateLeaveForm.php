<?php

namespace App\Http\Requests;

use App\Models\Soldier;
use App\Nedsa\Constants;
use App\Vamyar\Contracts\ResponsiveFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateLeaveForm extends ResponsiveFormRequest
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
        $soldier = Soldier::findOrFail($this->soldier);
        $leaveInfo = $soldier->leaveInfo;

        $calculated = $this->calculateRemaining($soldier);
        $soldier->leaveInfo->update([
            'marriage_vacation_leave' => $calculated ?: $leaveInfo->marriage_vacation_leave,
            'parents_die_vacation_leave' => $calculated?: $leaveInfo->parents_die_vacation_leave,
            'deserved' => $calculated ?: $leaveInfo->deserved,
            'bonus' => $calculated ?: $leaveInfo->bonus,
            'torahi' => $calculated ?: $leaveInfo->torahi,
            'total' => $calculated ? $leaveInfo->total - $calculated : $leaveInfo->total,
        ]);

        $leave = $soldier->leaves()->create($this->except('soldier', 'birthday'));
        $this->result = $leave;

        return $this;
    }

    private function calculateRemaining($soldier)
    {
        $leaveInfo = $soldier->leaveInfo;

        if ($this->type == Constants::LEAVE_TYPE['DESERVED_LEAVE']['code'])
            return $this->cast($leaveInfo->desereved - $this->days);

        if ($this->type == Constants::LEAVE_TYPE['BONUS_LEAVE']['code'])
            return $this->cast($leaveInfo->bonus - $this->days);

        if ($this->type == Constants::LEAVE_TYPE['PARENTS_DIE_LEAVE']['code'])
            return $this->cast($leaveInfo->parents_die_vacation_leave - $this->days);

        if ($this->type == Constants::LEAVE_TYPE['MARRIAGE_LEAVE']['code'])
            return $this->cast($leaveInfo->marriage_vacation_leave - $this->days);

        if ($this->type == Constants::LEAVE_TYPE['TORAHI']['code'])
            return $this->cast($leaveInfo->torahi - $this->days);

        if ($this->type == Constants::LEAVE_TYPE['ESTELAJI']['code'])
            return $this->cast($leaveInfo->estelaji - $this->days);

        if ($this->type == Constants::LEAVE_TYPE['EMERGENCY']['code'])
            return $this->cast($leaveInfo->emergency - $this->days);

        return null;
    }

    public function cast($value)
    {
        if ($value < 0)
            return 0;
        return $value;
    }
}
