<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\AttendanceMeta;
use App\Attendance;
use App\Member;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;




class AttendanceController extends Controller
{
    protected $page_title = "Attendance";

    public function index()
    {
        $cacheddata = Cache::get('att_id');
        
        if(empty($cacheddata)) {
            return redirect()->back()->with('error', 'Start Attendance');
        }
        extract($cacheddata);
        $attendanceMeta = AttendanceMeta::where('att_id', $cacheddata['att_id'])->first();

        $members = Member::all();

        $page_title = $this->page_title;
        $heading = "Manage Members Attendance";
        return view('attendance.index', compact('attendanceMeta', 'members', 'heading', 'page_title'));
    }
        
    public function manage()
    {
        $page_title = $this->page_title;
        $heading = 'Start Attendance';
        $attentants = AttendanceMeta::all();
        return view('attendance.manage', compact('attentants','page_title', 'heading'));
    }

    public function show($id)
    {
        $cacheddata = Cache::get('att_id');

        if (empty($cacheddata)) {
            return redirect()->back()->with('error', 'Start Attendance');
        }

        $attendanceMeta = AttendanceMeta::where('att_id', $id)->first();

        $members = Member::all();

        $page_title = $this->page_title;
        $heading = "Manage Members Attendance";
        return view('attendance.index', compact('attendanceMeta', 'members', 'heading', 'page_title'));
    }

    public function start(Request $request)
    {
        $data = [
            'att_id' => (string) Str::uuid(),
            'start_time' => $this->getCurrentTime(),
            'active' => 1
        ];

        if(empty(Cache::get('att_id'))){
            AttendanceMeta::create($data);
            Cache::forever('att_id', ['active'=> $data['active'],'att_id' =>$data['att_id']]);
            return redirect()->route('attendance.show', $data['att_id'])->with('success','attendance started');
        }
        
        return redirect()->back()->with('error','attendance for today already started');
        
    }

    public function endAttendance()
    {Cache::forget('att_id');
        $cache = Cache::get('att_id');
        $att = AttendanceMeta::where('att_id', $cache['att_id'])->first();
        // return $att->start_time;
        $data = [
            'end_time' => $this->getCurrentTime(),
            'duration' => Carbon::create($att->start_time)->diffInMinutes(),
            'active' => false
        ];

        // dd($data);
        $att->update($data);
        
        echo 'attendance ended';
    }

    private function getCurrentTime()
    {
        return Carbon::now();
    }
}
