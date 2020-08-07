<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contract extends Model
{
    protected $guarded = [];

    public function getInputDateAttribute()
    {
        return $this->created_at->format('M d, Y');
    }

    public function getRentDurationNumberAttribute()
    {
        $rent_duration = explode(" ",$this->rent_duration);

        return $rent_duration[0];
    }

    public function getRentDurationPeriodAttribute()
    {
        $rent_duration = explode(" ",$this->rent_duration);

        return $rent_duration[1];
    }

    public function getPeriodAttribute()
    {
        $start_date = Carbon::parse($this->start_date);
        $end_date = Carbon::parse($this->end_date);

        return "{$start_date->format('M d Y')} - {$end_date->format('M d Y')}";
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
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
