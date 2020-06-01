<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Mail\TestMail;
use Mail;

class MemberController extends Controller
{
    
    private $page_title = 'Manage Members';

    public function index()
    {
        $members = Member::all();

        $page_title = $this->page_title;
        $heading = 'List of Members';
        return view('member.index', compact('page_title','heading', 'members'))->with('message', 'welcome');
    }

    public function show($id)
    {
        $member = Member::find($id);
        $page_title = $this->page_title;
        $heading = 'View Member';
        return view('member.show', compact('member','page_title', 'heading'));
    }

    public function bornOn(Request $request)
    {
        $day = $request->query('day');
        $members = Member::all();
        $heading = $day.' Born';
        $page_title = $this->page_title;
        return view('member.dayborn', compact('day','members','heading','page_title'));
    }


    
    public function create()
    {
        
        $heading = 'Add New Member';
        $page_title = $this->page_title;
        return view('member.create', compact('heading', 'page_title'));
    }
    
    
    public function store(Request $request)
    {
        $request->validate($this->validate_fields());
        $prepared_data = $this->prepare_data($request, new Member);
        
        $prepared_data->save();
        return redirect()->route('member.create')->with('success', 'New Member Created');
    }

    public function edit(Request $request, $id)
    {
        $member = Member::find($id);
        $heading = "Edit Page";
        $page_title = $this->page_title;
        return view('member.edit', compact('member', 'heading', 'page_title'));
    }

    public function update(Request $request, $update_id)
    {
        $member = new Member;
        $prepared_data = $this->prepare_data($request, $member::find($update_id));
        $prepared_data->update();

        return redirect()->route('member.index')->with('message', 'update successful');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Member Successfully Deleted');
    }

    public function send_mail()
    {
        $data = ['name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail'];

        $mailInstance = new TestMail($data);
        // Mail::to('mailfadluharuna@gmail.com')->send($mailInstance);

        echo 'mail sent';
    }

    private function prepare_data($request, $model)
    {
        if(!isset($model->id)){
            $model->member_id = uniq_id(8);
        }

        $model->avatar = $request->input('avatar');
        $model->user_id = $request->input('user_id', 0);
        $model->first_name = $request->input('first_name');
        $model->last_name = $request->input('last_name');
        $model->dob = $request->input('dob');
        $model->gender = $request->input('gender');
        $model->phone = $request->input('phone');
        $model->email = $request->input('email');
        $model->occupation = $request->input('occupation');
        $model->location = $request->input('location');
        $model->hometown = $request->input('hometown');
        $model->marital_status = $request->input('marital_status');
        $model->spouse = $request->input('spouse');
        $model->no_of_children = $request->input('no_of_children');

        return $model;
    }

    private function validate_fields(){
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'email:rfc',
            'marital_status' => 'required'
        ];
    }
}
