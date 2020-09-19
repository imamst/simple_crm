<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractFile extends Model
{
    protected $guarded = [];

    public function contract()
    {
        return $this->belongsTo('App\Contract');
    }
}
