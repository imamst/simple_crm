<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
