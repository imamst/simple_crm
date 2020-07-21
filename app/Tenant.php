<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function contracts()
    {
        return $this->belongsTo('App\Contract');
    }
}
