<?php

namespace App\Http\Livewire\Member;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Livewire\Component;

class CreateIndex extends Component
{
    public $first_name, 
           $last_name, 
           $gender,$dob, 
           $email, $phone, $spouse,
           $occupation, $location, 
           $hometown, $marital_status,
            
           $no_of_children, $avatar;
    
        
    public function processForm(Request $request)
    {
        $this->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'email' => 'email:rfc',
                'marital_status' => 'required'
            ]
        );

        $data = $request->all();
        $data['data']['member_id'] = uniq_id(8);
        $data['data']['user_id'] = 1;
        Member::create($data['data']);
        session()->flash('success', 'New Member Successfully Created');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.member.create-index');
    }
}
