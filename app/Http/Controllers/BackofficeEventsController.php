<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackofficeEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->sortBy('date_start');
        return view('backoffice.events', [
            'events' => $events
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all()->sortBy('date_start');
        $create = true;
        return view('backoffice.events', [
            'events' => $events,
            'create' => $create,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date_start' => 'required',
            'date_end' => 'required',
            'name' => 'required',
            'img_src' => 'required',
            'description' => 'required',
            'place' => 'required',
            'address' => 'required',
            'url' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);
        $name = $request->input('name');
        $request['slug'] = str_replace('.','',(str_replace(' ','-',strtolower($name))));
        $request['user_id'] = Auth::user()->id;
        Event::create($request->only('user_id', 'date_start', 'date_end', 'name', 'slug', 'img_src', 'description', 'place', 'address', 'url', 'telephone', 'email'));
        return redirect()->route('events.index')->with('success', 'Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::all()->sortBy('date_start');
        $event = Event::find($id);
        $edit = true;
        return view('backoffice.events', [
            'eventToEdit' => $event,
            'events' => $events,
            'edit' => $edit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->name = $request->name;
        $event->slug = str_replace('.','',(str_replace(' ','-',strtolower($request->name))));
        $event->img_src = $request->img_src;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->address = $request->address;
        $event->telephone = $request->telephone;
        $event->email = $request->email;
        $event->url = $request->url;
        $query = $event->save();

        if($query){
            return redirect()->route('events.index')->with('success','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
