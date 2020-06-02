<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class AttendanceMeta extends Model
{
    //
    protected $fillable = ['att_id', 'start_time', 'end_time', 'duration', 'active'];

}
