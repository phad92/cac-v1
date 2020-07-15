<?php

namespace App\Http\Livewire\Attendance;

use App\Member;
use App\AttendanceMeta;
use App\Attendance;

use Illuminate\Support\Collection;

use Livewire\Component;

class AttendanceList extends Component
{
    public $members;
    public $isPresent = false;
    public $meta_id;

    public $hidden = false;
    public $attendantsPresent;

    public function mount($meta_id)
    {
        $this->meta_id = $meta_id;

        // $attendantKeys = $this->getAttendantKeys();
        $this->getAttendants();
    }

    public function present($member_id)
    {
        $this->isPresent = $this->meta_id;
        Attendance::create([
            'member_id' => $member_id,
            'meta_id' => $this->meta_id,
            'present' => true
        ]);
        $this->getAttendants();
    }

    public function getAttendantKeys()
    {
        $attendants = Attendance::where('meta_id', $this->meta_id)
            ->where('present', true);
        return $attendants->pluck('member_id')->toArray();
    }

    private function getAttendants()
    {
        $attendantKeys = $this->getAttendantKeys();
        $this->members = Member::all()->except($attendantKeys);
    }


    public function render()
    {
        return view('livewire.attendance.attendance-list');
    }
}
