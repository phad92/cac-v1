<?php

namespace App\Http\Controllers;
use App\Event_cat;
use Illuminate\Http\Request;

class EventCatController extends Controller
{
    //
    private $page_title = 'Event Category';

    public function index()
    {
        $eventcats = Event_cat::all();

        $page_title = $this->page_title;
        $heading = 'List of Event Categories';
        return view('event.cat.index', compact('heading', 'page_title','eventcats'));
    }


    public function create()
    {

        $subheading = 'Create Event Category';
        return view('event.cat.create', compact('subheading'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $eventCat = new Event_cat;
        $eventCat->name = $request->input('name');
        $eventCat->save();

        return redirect()->route('eventcat.index')->with('success', 'New Event Category Successfully Created');
    }

    public function edit($id)
    {
        $eventcat = Event_cat::find($id);
        
        $page_title = $this->page_title;
        $heading = 'Edit Event Category';
        return view('event.cat.edit', compact('heading','page_title','eventcat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $eventcat = Event_cat::find($id);
        $eventcat->name = $request->input('name');
        $eventcat->update();
        return redirect()->route('eventcat.index')->with('success', 'update successfull');
    }

    public function destroy(Event_cat $eventcat)
    {
        $eventcat->delete();
        return redirect()->route('eventcat.index')->with('success', 'Delete Successful');
    }
}
