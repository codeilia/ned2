<?php

namespace App\Models;

use App\Nedsa\Constants;
use App\Nedsa\Helpers\CustomDateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Soldier extends BaseModel
{
    protected $guarded = [];

    public function getBirthdayAttribute($value)
    {
        return CustomDateTime::toJalali($value);
    }

    public function getMarriedAttribute($attribute)
    {
        return $attribute == 0 ? "مجرد" : 'متاهل';
    }

//    public function setBirthdayAttribute($value)
//    {
//        return Carbon::parse(CustomDateTime::toGreg($value));
//    }

//    public function unit()
//    {
//        return $this->hasOne(Unit::class);
//    }

    public function martialInfo()
    {
        return $this->hasOne(MartialInfo::class);
    }

    public function leaveInfo()
    {
        return $this->hasOne(LeaveInfo::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function extraDuties()
    {
        return $this->hasMany(ExtraDuty::class);
    }

    public function voidDuties()
    {
        return $this->hasMany(VoidDuty::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function shortages()
    {
        return $this->hasMany(Shortage::class);
    }

    public function getLatestLeaveDateAttribute()
    {
        $leave = $this->leaves()->latest()->first();
        return $leave->updated_at;
    }

    public function getLatestLeaveDaysAttribute()
    {
        $leave = $this->leaves()->latest()->first();
        return $leave->days;
    }

    public function getUsedBonusAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['BONUS_LEAVE']['code'])->sum('days');
    }

    public function getUsedExtraBonusAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['EXTRA_BONUS']['code'])->sum('days');
    }

    public function getUsedDeservedAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['DESERVED_LEAVE']['code'])->sum('days');
    }

    public function getUsedParentsDieAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['PARENTS_DIE_LEAVE']['code'])->sum('days');
    }

    public function getUsedMarriageAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['MARRIAGE_LEAVE']['code'])->sum('days');
    }

    public function getUsedTorahiAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['TORAHI']['code'])->sum('days');
    }

    public function getUsedEstelajiAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['ESTELAJI']['code'])->sum('days');
    }

    public function getUsedEmergencyAttribute()
    {
        return $this->leaves()->whereType(Constants::LEAVE_TYPE['EMERGENCY']['code'])->sum('days');
    }

    public function getRemainingBonusAttribute()
    {
        return (int) $this->leaveInfo->bonus -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['BONUS_LEAVE']['code'])->sum('days');
    }

    public function getRemainingExtraBonusAttribute()
    {
        return (int) $this->leaveInfo->extra_bonus -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['EXTRA_BONUS']['code'])->sum('days');
    }

    public function getRemainingDeservedAttribute()
    {
        return (int) $this->leaveInfo->deserved -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['DESERVED_LEAVE']['code'])->sum('days');
    }

    public function getRemainingParentsDieAttribute()
    {
        return (int) $this->leaveInfo->parents_die_vacation_leave -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['PARENTS_DIE_LEAVE']['code'])->sum('days');
    }

    public function getRemainingMarriageAttribute()
    {
        return (int) $this->leaveInfo->marriage_vacation_leave -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['MARRIAGE_LEAVE']['code'])->sum('days');
    }

    public function getRemainingTorahiAttribute()
    {
        return (int) $this->leaveInfo->torahi -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['TORAHI']['code'])->sum('days');
    }

    public function getRemainingEstelajiAttribute()
    {
        return (int) $this->leaveInfo->estelaji -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['ESTELAJI']['code'])->sum('days');
    }

    public function getRemainingEmergencyAttribute()
    {
        return (int) $this->leaveInfo->emergency -
            $this->leaves()->whereType(Constants::LEAVE_TYPE['EMERGENCY']['code'])->sum('days');
    }

    public function getEndDutyDateAttribute()
    {
        return Carbon::parse($this->martialInfo->sent_date)->addMonth($this->martialInfo->legal_duty_time);
    }

    public function getActualEndDutyDateAttribute()
    {
        $legal = Carbon::parse($this->martialInfo->sent_date)->addMonth($this->martialInfo->legal_duty_time);

        $withShortage = $legal->subDays($this->shortages()->sum('days'));

        $withExtraDuty = $withShortage->addDays($this->extraDuties()->sum('days') + $this->extraDuties()->sum('void_duty'));

        return $withExtraDuty;
    }
}
