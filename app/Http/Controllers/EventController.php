<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Event;
use App\Event_cat;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class EventController extends Controller
{
    private $page_title = 'Manage Events';

    /**
     * Add a contact person/persons
     * add event calendar -> https://www.tutsmake.com/laravel-ajax-full-calendar-example-tutorial/
     * create start and end date column - datetime datatype
     */

    public function index()
    {
        $events = Event::all();
        $page_title = $this->page_title;
        $carbon = new Carbon;
        $heading = 'List of Events';
        return view('event.index', compact('carbon','page_title', 'heading', 'events'))->with('message', 'welcome');
    }

    public function show(Event $event)
    {
        $page_title = $this->page_title;
        $heading = 'Event';
        return view('event.show', compact('event','heading', 'page_title'));
    }



    public function create()
    {

        $carbon = new Carbon;
        $categories = Event_cat::all();
        $heading = 'Add New Event';
        $page_title = $this->page_title;
        return view('event.create', compact('carbon','heading', 'categories','page_title'));
    }


    public function store(Request $request)
    {
        $request->validate($this->validate_fields());
        $prepared_data = $this->prepare_data($request, new Event);
        
        $prepared_data->save();
        return redirect()->route('event.create')->with('success', 'New Event Created');
    }
    
    public function edit(Request $request, $id)
    {
        $event = Event::find($id);
        $categories = Event_cat::all();
        $heading = "Edit Event - ". $event->title;
        $page_title = $this->page_title;
        return view('event.edit', compact('event','categories', 'heading', 'page_title'));
    }
    
    public function update(Request $request, $update_id)
    {
        $event = new Event;
        $request->validate($this->validate_fields());
        $prepared_data = $this->prepare_data($request, $event::find($update_id));
        $prepared_data->update();

        return redirect()->route('event.index')->with('success', 'update successful');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event Successfully Deleted');
    }

    private function prepare_data($request, $model)
    {
        if (!isset($model->id)) {
            $model->event_id = uniq_id(8);
        }

        $model->poster = 'poster';//$request->input('avatar');
        $model->user_id = 1; //$request->input('user_id', 0);
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->venue = $request->input('venue');
        $model->category_id = $request->input('category_id');
        $model->event_date = $request->input('event_date');
        $model->event_time = $request->input('event_time');
        $model->rate = $request->input('rate');
       

        return $model;
    }

    private function validate_fields()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'rate' => 'required',
            'category_id' => 'required',
            'venue' => 'required',
            'event_date' => 'required',
            'event_time' => 'required'
        ];
    }

}
