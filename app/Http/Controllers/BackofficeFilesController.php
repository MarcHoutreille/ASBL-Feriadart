<?php

namespace App\Http\Controllers;
use App\Models\Event;

use App\Models\File;

use Illuminate\Http\Request;

class BackofficeFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all()->sortBy('created_at');
        return view('backoffice.files', [
            'files' => $files,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all()->sortBy('created_at');
        $events = Event::all()->sortBy('date_start');
        $create = true;
        return view('backoffice.files', [
            'files' => $files,
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
            'type' => 'required',
            'img_src' => 'required',
           
        ]);
        File::create($request->only('event_id', 'type', 'img_src'));

        if ($request->has('front')) {
            return back()->with('success','Added Successfully');    
        }
        
        return redirect()->route('files.index')->with('success', 'Added Succesfully');
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
        $files = File::all()->sortBy('created_at');
        $file = File::find($id);
        $events = Event::all()->sortBy('date_start');
        $edit = true;
        return view('backoffice.files', [
            'fileToEdit' => $file,
            'files' => $files,
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
        $file = File::find($id);
        $file->event_id = $request->event_id;
        $file->type = $request->type;
        $file->img_src = $request->img_src;
        $query = $file->save();

        if($query){
            return redirect()->route('files.index')->with('success','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $this->authorize('delete', $file);
        $file->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
