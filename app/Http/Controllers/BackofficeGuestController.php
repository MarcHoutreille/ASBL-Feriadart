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
        //
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

        return back();
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
        $guests = Guest::all();
        $guest = Guest::find($id);
        return view('backoffice.guestbookedit', [
            'guestToEdit' => $guest,
            'guests' => $guests
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
        // dd($guest);
        $this->authorize('delete', $guest);
        $guest->delete();
        return back();
    }
}