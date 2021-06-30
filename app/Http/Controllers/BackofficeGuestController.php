<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class BackofficeGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all()->sortBy('created_at');
        return view('backoffice.guestbook', [
            'guests' => $guests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all()->sortBy('created_at');
        $create = true;
        return view('backoffice.guestbook', [
            'guests' => $guests,
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
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Guest::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        if ($request->has('front')) {
            return back()->with('success','Added Successfully');    
        }

        return redirect()->route('guest.index')->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guest = Guest::find($id);
        $guest->accepted = true;
        $query = $guest->save();

        if($query){
            return redirect()->route('guest.index')->with('success','Accepted Successfully');
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
        $guests = Guest::all()->sortBy('created_at');
        $guest = Guest::find($id);
        $edit = true;
        return view('backoffice.guestbook', [
            'guestToEdit' => $guest,
            'guests' => $guests,
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
        $guest = Guest::find($id);
        $guest->created_at = $request->created_at;
        $guest->name = $request->name;
        $guest->title = $request->title;
        $guest->email = $request->email;
        $guest->message = $request->message;
        $guest->accepted = $request->accepted;
        $query = $guest->save();

        if($query){
            return redirect()->route('guest.index')->with('success','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $this->authorize('delete', $guest);
        $guest->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
