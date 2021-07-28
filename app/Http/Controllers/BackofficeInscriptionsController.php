<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


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
            'img01' => 'mimes:jpeg,png,jpg|max:5048|required',
            'img02' => 'mimes:jpeg,png,jpg|max:5048',
            'img03' => 'mimes:jpeg,png,jpg|max:5048',
            'img04' => 'mimes:jpeg,png,jpg|max:5048',
            'img05' => 'mimes:jpeg,png,jpg|max:5048',
        ]);

        $inscription = new Inscription;
        $inscription->event_id = $request->event_id;
        $inscription->fname = $request->fname;
        $inscription->lname = $request->lname;
        $inscription->bio = $request->bio;
        $inscription->products = $request->products;
        $inscription->telephone = $request->telephone;
        $inscription->email = $request->email;
        if ($request->url) {
            $inscription->url = $request->url;
        }
        if ($request->facebook) {
            $inscription->facebook = $request->facebook;
        }
        if ($request->instagram) {
            $inscription->instagram = $request->instagram;
        }
        if ($request->img01) {
            $newImageName = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img01->extension();
            $request->img01->move(public_path('images/artists'), $newImageName);
            $request['img_01'] = "/images/artists/" . $newImageName;
            $inscription->img_01 = $request->img_01;
        }
        if ($request->img02) {
            $newImageName2 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img02->extension();
            $request->img02->move(public_path('images/artists'), $newImageName2);
            $request['img_02'] = "/images/artists/" . $newImageName2;
            $inscription->img_02 = $request->img_02;
        }
        if ($request->img03) {
            $newImageName3 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img03->extension();
            $request->img03->move(public_path('images/artists'), $newImageName3);
            $request['img_03'] = "/images/artists/" . $newImageName3;
            $inscription->img_03 = $request->img_03;
        }
        if ($request->img04) {
            $newImageName4 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img04->extension();
            $request->img04->move(public_path('images/artists'), $newImageName4);
            $request['img_04'] = "/images/artists/" . $newImageName4;
            $inscription->img_04 = $request->img_04;
        }
        if ($request->img05) {
            $newImageName5 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img05->extension();
            $request->img05->move(public_path('images/artists'), $newImageName5);
            $request['img_05'] = "/images/artists/" . $newImageName5;
            $inscription->img_05 = $request->img_05;
        }
        $inscription->save();

        $id = $request->event_id;
        $event = Event::where('id', $id)->first();
        $create = false;

        if ($request->front) {
            return redirect()->route('event.show', [
                'event' => $event,
                'create' => $create
            ])->with('success', 'Inscribed Successfully');
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

        if ($query) {
            return redirect()->route('inscriptions.index')->with('success', 'Accepted Successfully');
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
        if ($request->img01) {
            $oldImage = $inscription->img_01;
            File::delete(public_path($oldImage));
            $newImageName = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img01->extension();
            $request->img01->move(public_path('images/artists'), $newImageName);
            $request['img_01'] = "/images/artists/" . $newImageName;
            $inscription->img_01 = $request->img_01;
        }
        if ($request->img02) {
            $oldImage2 = $inscription->img_02;
            File::delete(public_path($oldImage2));
            $newImageName2 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img02->extension();
            $request->img02->move(public_path('images/artists'), $newImageName2);
            $request['img_02'] = "/images/artists/" . $newImageName2;
            $inscription->img_02 = $request->img_02;
        }
        if ($request->img03) {
            $oldImage3 = $inscription->img_03;
            File::delete(public_path($oldImage3));
            $newImageName3 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img03->extension();
            $request->img03->move(public_path('images/artists'), $newImageName3);
            $request['img_03'] = "/images/artists/" . $newImageName3;
            $inscription->img_03 = $request->img_03;
        }
        if ($request->img04) {
            $oldImage4 = $inscription->img_04;
            File::delete(public_path($oldImage4));
            $newImageName4 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img04->extension();
            $request->img04->move(public_path('images/artists'), $newImageName4);
            $request['img_04'] = "/images/artists/" . $newImageName4;
            $inscription->img_04 = $request->img_04;
        }
        if ($request->img05) {
            $oldImage5 = $inscription->img_05;
            File::delete(public_path($oldImage5));
            $newImageName5 = $request->fname . '-' . rand() . '-' . $request->event_id . '.' . $request->img05->extension();
            $request->img05->move(public_path('images/artists'), $newImageName5);
            $request['img_05'] = "/images/artists/" . $newImageName5;
            $inscription->img_05 = $request->img_05;
        }
        if ($request->url) {
            $inscription->url = $request->url;
        }
        if ($request->facebook) {
            $inscription->facebook = $request->url;
        }
        if ($request->instagram) {
            $inscription->instagram = $request->url;
        }
        $inscription->accepted = $request->accepted;
        $query = $inscription->save();

        if ($query) {
            return redirect()->route('inscriptions.index')->with('success', 'Updated Successfully');
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
        if (File::exists(public_path($inscription->img_01))) {
            File::delete(public_path($inscription->img_01));
        }
        if (File::exists(public_path($inscription->img_02))) {
            File::delete(public_path($inscription->img_02));
        }
        if (File::exists(public_path($inscription->img_03))) {
            File::delete(public_path($inscription->img_03));
        }
        if (File::exists(public_path($inscription->img_04))) {
            File::delete(public_path($inscription->img_04));
        }
        if (File::exists(public_path($inscription->img_05))) {
            File::delete(public_path($inscription->img_05));
        }
        $this->authorize('delete', $inscription);
        $inscription->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
