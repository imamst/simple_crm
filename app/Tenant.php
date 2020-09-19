<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tenant extends Model
{
    protected $guarded = [];
    
    protected static function boot() {
        parent::boot();
 
        //Generate and set UUID automatically for the user
        static::creating(function($user) {
            $user->id = uniqid('cst',true);
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
        $this->attributes['id'] = preg_replace('/\./', '', uniqid('cst', true));
    }

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
