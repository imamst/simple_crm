<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Contract extends Model
{
    protected $guarded = [];

    protected static function boot() {
        parent::boot();
 
        //Generate and set UUID automatically for the user
        static::creating(function($user) {
            $user->id = uniqid('cnt',true);
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected function setIdAttribute($value)
    {
        $this->attributes['id'] = preg_replace('/\./', '', uniqid('srm', true));
    }

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
        return $this->belongsTo('App\Agent', 'agent_national_id');
    }

    public function landlord()
    {
        return $this->belongsTo('App\User', 'landlord_national_id');
    }

    public function tenant()
    {
        return $this->hasOne('App\Tenant');
    }
}
