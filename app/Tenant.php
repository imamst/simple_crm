<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $guarded = [];

    public function setIncomeAttribute($value)
    {
        $this->attributes['income'] = str_replace(',','',$value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->family_name}";
    }

    public function getInputDateAttribute()
    {
        return $this->created_at->format('M d, Y');
    }

    public function contract()
    {
        return $this->belongsTo('App\Contract');
    }
}
