<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'fname' => 'required',
            'lname' => 'required',
            'title' => 'required',
            'bio' => 'required',
            'img' => 'required|mimes:jpeg,png,jpg|max:5048',
            'email' => 'required',
        ]);
        $member = new Member;
        $member->fname = $request->fname;
        $member->lname = $request->lname;
        $member->title = $request->title;
        $member->bio = $request->bio;
        $member->email = $request->email;
        $newImage = $request->fname . '-' . rand() . '.' . $request->img->extension();
        $request->img->move(public_path('images/members'), $newImage);
        $member->img_src = "/images/members/" . $newImage;
        if ($request->url) {
            $member->url = $request->url;
        }
        if ($request->facebook) {
            $member->facebook = $request->facebook;
        }
        if ($request->instagram) {
            $member->instagram = $request->instagram;
        }
        $member->save();

        return redirect()->route('members.index')->with('success', 'Added Successfully');
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
        $member->fname = $request->fname;
        $member->lname = $request->lname;
        $member->title = $request->title;
        $member->bio = $request->bio;
        $member->email = $request->email;
        if ($request->img) {
            $oldImage = $member->img_src;
            File::delete(public_path($oldImage));
            $newImage = $request->fname . '-' . rand() . '.' . $request->img->extension();
            $request->img->move(public_path('images/members'), $newImage);
            $member->img_src = '/images/members/' . $newImage;
        }
        if ($request->url) {
            $member->url = $request->url;
        }
        if ($request->facebook) {
            $member->facebook = $request->facebook;
        }
        if ($request->instagram) {
            $member->instagram = $request->instagram;
        }
        $query = $member->save();

        if ($query) {
            return redirect()->route('members.index')->with('success', 'Updated Successfully');
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
        if (File::exists(public_path($member->img_src))) {
            File::delete(public_path($member->img_src));
        }
        $this->authorize('delete', $member);
        $member->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
