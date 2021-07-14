<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class BackofficeMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all()->sortBy('name');
        return view('backoffice.members', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all()->sortBy('name');
        $create = true;
        return view('backoffice.members', [
            'members' => $members,
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
            'name' => 'required',
            'title' => 'required',
            'bio' => 'required',
            'img_src' => 'required',
            'email' => 'required',
            'url' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ]);
        Member::create($request->only('name', 'title', 'bio', 'img_src', 'email', 'url', 'facebook', 'instagram'));

        return redirect()->route('members.index')->with('success','Added Successfully');
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
        $members = Member::all()->sortBy('name');
        $member = Member::find($id);
        $edit = true;
        return view('backoffice.members', [
            'memberToEdit' => $member,
            'members' => $members,
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
        $member = Member::find($id);
        $member->name = $request->name;
        $member->title = $request->title;
        $member->bio = $request->bio;
        $member->img_src = $request->img_src;
        $member->email = $request->email;
        $member->url = $request->url;
        $member->facebook = $request->facebook;
        $member->instagram = $request->instagram;
        $query = $member->save();

        if($query){
            return redirect()->route('members.index')->with('success','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $this->authorize('delete', $member);
        $member->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
