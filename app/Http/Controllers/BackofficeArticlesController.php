<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BackofficeArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        return view('backoffice.articles', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all()->sortByDesc('created_at');
        $create = true;
        return view('backoffice.articles', [
            'articles' => $articles,
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
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => 'required',
            'img' => 'required|mimes:jpeg,png,jpg|max:5048',
        ]);

        $article = new Article;
        $article->user_id = Auth::user()->id;
        $article->title = $request->title;
        $slug = str_replace('.', '', (str_replace(' ', '-', strtolower($request->title)))); // creates a slug for the article url
        $article->slug = $slug;
        $article->excerpt = $request->excerpt;
        $article->body = $request->body;
        $article->url = $request->url;
        $newImage = $slug . '-' . rand() . '.' . $request->img->extension(); // renames uploaded picture
        $request->img->move(public_path('images/articles'), $newImage); // stores the picture
        $article->img_src = "/images/articles/" . $newImage; // stores the picture path in the DB
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Added Succesfully');
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
        $articles = Article::all()->sortByDesc('created_at');
        $article = Article::find($id);
        $edit = true;
        return view('backoffice.articles', [
            'articleToEdit' => $article,
            'articles' => $articles,
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
        $article = Article::find($id);
        $article->created_at = $request->created_at;
        $article->title = $request->title;
        $article->slug = str_replace('.', '', (str_replace(' ', '-', strtolower($request->title))));
        $article->excerpt = $request->excerpt;
        $article->body = $request->body;
        if ($request->img) { // if the user chooses a new picture
            $oldImage = $article->img_src; // gets the old picture path
            File::delete(public_path($oldImage)); // deletes the old picture
            $newImage = time() . '-' . $request->title . '.' . $request->img->extension(); // renames the new picture
            $request->img->move(public_path('images/articles'), $newImage); // stores the new picture
            $article->img_src = '/images/articles/' . $newImage; // stores the new picture path in the DB
        }
        $article->url = $request->url;
        $query = $article->save();

        if ($query) {
            return redirect()->route('articles.index')->with('success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return back()->with('success', 'Deleted Succesfully');
    }
}
