<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = ['user_id','member_id','first_name', 'last_name', 'dob', 'gender', 'phone', 'email', 'occupation', 'location', 'hometown', 'marital_status', 'spouse', 'no_of_children'];

    public function getAgeAttribute($value)
    {
        return Carbon::parse($this->dob)->age;
    }

    public function getBirthDayAttribute($value)
    {
        return Carbon::parse($this->dob)->englishDayOfWeek;
    }

    public function getFullNameAttribute($value)
    {
        return ucwords($this->first_name .' '. $this->last_name);
    }
}
