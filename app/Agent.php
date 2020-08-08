<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'national_id';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
    }

    public function setFamilyNameAttribute($value)
    {
        $this->attributes['family_name'] = ucwords($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->family_name}";
    }

    public function landlord()
    {
        return $this->belongsTo('App\User', 'landlord_national_id');
    }

    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }
}
