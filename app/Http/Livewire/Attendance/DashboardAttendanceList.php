<?php

namespace App\Http\Livewire\Attendance;
use App\AttendanceMeta;
use Livewire\Component;

class DashboardAttendanceList extends Component
{
    public $collection;
    public $collectionCount;
    public $attdshort;
    public $attdfull;
    public $attendance;

    protected $listeners = [
        'fullId' => 'showFullId'
    ];


    // public function mount()
    // {
    // }

    public function showFullId($attendance)
    {
        $this->attdshort = $attendance->attdshort;
    }
    public function render()
    {
        $this->collection = AttendanceMeta::all();
        return view('livewire.attendance.dashboard-attendance-list');
    }
}
