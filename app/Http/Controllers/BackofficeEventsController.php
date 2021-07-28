<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
            'img' => 'required|mimes:jpeg,png,jpg|max:5048',
            'description' => 'required',
            'inscriptionimg' => 'required|mimes:jpeg,png,jpg|max:5048',
            'inscription_txt' => 'required',
            'place' => 'required',
            'address' => 'required',
            'url' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);

        $event = new Event;
        $event->user_id = Auth::user()->id;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->name = $request->name;
        $name = $event->name;
        $slug = Str::slug($name, '-');
        $event->slug = $slug;
        $event->description = $request->description;
        $event->inscription_txt = $request->inscription_txt;
        $event->place = $request->place;
        $event->address = $request->address;
        $event->telephone = $request->telephone;
        $event->email = $request->email;
        $event->url = $request->url;
        $newImage = $slug . '-' . rand() . '.' . $request->img->extension();
        $request->img->move(public_path('images/events'), $newImage);
        $event->img_src = "/images/events/" . $newImage;
        $newInscriptionImage = $slug . "-inscription" . '-' . rand() . '.' . $request->inscriptionimg->extension();
        $request->inscriptionimg->move(public_path('images/events'), $newInscriptionImage);
        $event->inscription_img = "/images/events/" . $newInscriptionImage;
        $event->save();

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
        $event = Event::find($id);
        $event->open = true;
        $query = $event->save();

        if ($query) {
            return redirect()->route('events.index')->with('success', 'Opened Successfully');
        }
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
        $name = $event->name;
        $slug = Str::slug($name, '-');
        $event->slug = $slug;
        if ($request->img) {
            $oldImage = $event->img_src;
            File::delete(public_path($oldImage));
            $newImage = $slug . '-' . rand() . '.' . $request->img->extension();
            $request->img->move(public_path('images/events'), $newImage);
            $event->img_src = "/images/events/" . $newImage;
        }
        if ($request->inscriptionimg) {
            $oldInscriptionImage = $event->inscription_img;
            File::delete(public_path($oldInscriptionImage));
            $newInscriptionImage = $slug . "-inscription" . '-' . rand() . '.' . $request->inscriptionimg->extension();
            $request->inscriptionimg->move(public_path('images/events'), $newInscriptionImage);
            $event->inscription_img = "/images/events/" . $newInscriptionImage;
        }
        $event->description = $request->description;
        $event->inscription_txt = $request->inscription_txt;
        $event->place = $request->place;
        $event->address = $request->address;
        $event->telephone = $request->telephone;
        $event->email = $request->email;
        $event->url = $request->url;
        $event->open = $request->open;
        $query = $event->save();

        if ($query) {
            return redirect()->route('events.index')->with('success', 'Updated Successfully');
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
