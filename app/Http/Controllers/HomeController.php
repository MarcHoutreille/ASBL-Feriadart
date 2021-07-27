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
        $artist = Inscription::where('accepted', 1)->inRandomOrder()->first();
        $event = Event::where('open', 1)->latest()->first();
        $events = Event::all()->sortBy('date_start')->take(3);
        $articles = Article::all()->sortByDesc('created_at')->take(2);
        return view('home.index', ['artist' => $artist, 'event' => $event, 'events' => $events, 'articles' => $articles]);
    }
}
