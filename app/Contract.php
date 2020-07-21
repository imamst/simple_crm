<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function agent()
    {
        return $this->belongsTo('App\User', 'agent_id');
    }

    public function landlord()
    {
        return $this->belongsTo('App\User', 'landlord_id');
    }

    public function tenant()
    {
        return $this->hasOne('App\Tenant');
    }
}
