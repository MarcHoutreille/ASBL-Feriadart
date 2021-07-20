<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Inscription;
use Illuminate\Http\Request;

class BackofficeInscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions = Inscription::all()->sortByDesc('created_at');
        return view('backoffice.inscriptions', [
            'inscriptions' => $inscriptions,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscriptions = Inscription::all()->sortByDesc('created_at');
        $events = Event::all()->sortBy('date_start');
        $create = true;
        return view('backoffice.inscriptions', [
            'inscriptions' => $inscriptions,
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
            'event_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'bio' => 'required',
            'products' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'url' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'img_01' => 'required',
            'img_02' => 'required',
            'img_03' => 'required',
            'img_04' => 'required',
            'img_05' => 'required',
        ]);
        Inscription::create($request->only('event_id', 'fname', 'lname', 'bio', 'products', 'telephone', 'email', 'url', 'facebook', 'instagram', 'img_01', 'img_02', 'img_03', 'img_04', 'img_05'));
        $id = $request->event_id;
        $event = Event::where('id', $id)->first();
        $create = false;
        if ($request->has('front')) {
            return view('events.show', [
                'event' => $event,
                'create' => $create
            ])->with('success','Inscribed Successfully');    
        }
        return redirect()->route('inscriptions.index')->with('success', 'Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscription = Inscription::find($id);
        $inscription->accepted = true;
        $query = $inscription->save();

        if($query){
            return redirect()->route('inscriptions.index')->with('success','Accepted Successfully');
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
        $inscriptions = Inscription::all()->sortByDesc('created_at');
        $inscription = Inscription::find($id);
        $events = Event::all()->sortBy('date_start');
        $edit = true;
        return view('backoffice.inscriptions', [
            'inscriptionToEdit' => $inscription,
            'inscriptions' => $inscriptions,
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
        $inscription = Inscription::find($id);
        $inscription->event_id = $request->event_id;
        $inscription->fname = $request->fname;
        $inscription->lname = $request->lname;
        $inscription->bio = $request->bio;
        $inscription->products = $request->products;
        $inscription->telephone = $request->telephone;
        $inscription->email = $request->email;
        $inscription->url = $request->url;
        $inscription->facebook = $request->facebook;
        $inscription->instagram = $request->instagram;
        $inscription->img_01 = $request->img_01;
        $inscription->img_02 = $request->img_02;
        $inscription->img_03 = $request->img_03;
        $inscription->img_04 = $request->img_04;
        $inscription->img_05 = $request->img_05;
        $inscription->accepted = $request->accepted;
        $query = $inscription->save();

        if($query){
            return redirect()->route('inscriptions.index')->with('success','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscription $inscription)
    {
        $this->authorize('delete', $inscription);
        $inscription->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
