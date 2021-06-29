<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at')->take(2);
        $events = Event::all()->sortBy('date_start')->take(3);
        return view('index', ['events' => $events, 'articles' => $articles]);
    }

 
}
