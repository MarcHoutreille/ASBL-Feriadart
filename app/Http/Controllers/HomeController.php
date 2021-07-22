<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Event;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artist = Inscription::inRandomOrder()->first();
        $events = Event::all()->sortBy('date_start')->take(3);
        $articles = Article::all()->sortByDesc('created_at')->take(2);
        return view('home.index', ['artist' => $artist, 'events' => $events, 'articles' => $articles]);
    }

 
}
