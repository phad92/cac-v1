<?php

namespace App\Http\Controllers;


use App\AttendanceMeta;
use App\Attendance;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;


/**
 * TODO: ATTENDANCE META TABLE
 * add total number of members
 * update num of members present - view
 * update num of members asent - view
 * 
 * 
 */

class AttendanceController extends Controller
{
    protected $page_title = "Attendance";


    public function dashboard()
    {
        $page_title = $this->page_title;
        return view('attendance.dashboard', compact('page_title'));
    }

    

    public function attendants($meta_id)
    {
        $page_title = $this->page_title;
        $heading = 'Attendant List';
        // return $collection;
        $attendanceMeta = AttendanceMeta::where('meta_id', $meta_id)->first();
        $collection = Attendance::where('meta_id', $meta_id)->get();
        return view('attendance.attendants', compact('collection','attendanceMeta','page_title', 'heading'));
    }

    
}
