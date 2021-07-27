<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Inscription;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $id = $event->id;
        $artists = Inscription::where('event_id', $id)->get()->sortBy('created_at');
        return view('artists.index', [
            'artists' => $artists,
            'event' => $event
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Inscription::where('id', $id)->first();
        return view('artists.show', [
            'artist' => $artist,
        ]);
    }

    public function inscription($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $create = true;
        return view('events.show', [
            'event' => $event,
            'create' => $create,
        ]);
    }
}
