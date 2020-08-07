<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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

    public function agents()
    {
        return $this->hasMany('App\Agent', 'landlord_id');
    }

    public function contracts()
    {
        return $this->hasMany('App\Contract', 'landlord_id');
    }
}
