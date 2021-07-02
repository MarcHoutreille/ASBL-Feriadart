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
        $inscriptions = Inscription::all()->sortBy('created_at');
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
        $inscriptions = Inscription::all()->sortBy('created_at');
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
            'img_src' => 'required',
        ]);
        Inscription::create($request->only('event_id', 'fname', 'lname', 'bio', 'products', 'telephone', 'email', 'url', 'img_src'));

        if ($request->has('front')) {
            return back()->with('success','Inscribed Successfully');    
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
        $inscriptions = Inscription::all()->sortBy('created_at');
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
        $inscription->img_src = $request->img_src;
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