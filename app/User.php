<?php

namespace App;

use App\Models\Branch;
use App\Models\Contract;
use App\Models\CounterSaleStat;
use App\Models\Customer;
use App\Models\ProviderPayment;
use App\Models\Sale;
use App\Models\UserDetail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function contracts()
    {
        return $this->hasManyThrough(Contract::class, Sale::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function isAdmin()
    {
        return !! $this->role == 0;
    }

    public function isCounter()
    {
        return !! $this->role == 1;
    }

    public function providerPayments()
    {
        return $this->hasMany(ProviderPayment::class);
    }

    //this method is for counter type
    public function saleStat()
    {
        return $this->hasOne(CounterSaleStat::class);
    }

    public function hasSaleStat()
    {
        return !! $this->saleStat()->exists();
    }
}
