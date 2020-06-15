<?php

namespace App;
use App\Member;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = ['member_id', 'meta_id', 'present'];

    public function getAttendantNameAttribute()
    {
        return Member::find($this->member_id)->first()->fullname;
    }

    public function getPresentAttribute()
    {
        return ($this->present) ? 'Present' : 'Absent';
    }
}
