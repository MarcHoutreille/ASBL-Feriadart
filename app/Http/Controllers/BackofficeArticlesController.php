<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->validate($request, [
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'author' => 'required',
            'contact' => 'required',
            'url' => 'required',
            'img_src' => 'required',
        ]);
        $title = $request->input('title');
        $request['slug'] = str_replace('.','',(str_replace(' ','-',strtolower($title))));
        $request['user_id'] = Auth::user()->id;
        Article::create($request->only('user_id', 'title', 'excerpt', 'body', 'slug', 'author', 'contact', 'url', 'img_src'));
        return back()->with('message', 'Added Succesfully');
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
        $articles = Article::all();
        $article = Article::find($id);
        return view('backoffice.articlesedit', [
            'articleToEdit' => $article,
            'articles' => $articles
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
        $article->slug = $request->slug;
        $article->excerpt = $request->excerpt;
        $article->body = $request->body;
        $article->img_src = $request->img_src;
        $article->author = $request->author;
        $article->contact = $request->contact;
        $article->url = $request->url;
        $query = $article->save();

        if($query){
            return redirect()->route('articles.index')->with('success','Updated Successfully');
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
        return back();
    }
}
