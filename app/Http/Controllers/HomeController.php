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
        $artist = Inscription::where('accepted', 1)->inRandomOrder()->first(); // gets random Artist to be shown on "Featured Artist" section in the "Home" page
        $event = Event::where('open', 1)->orderBy('date_start')->first(); // gets closest Event open to inscriptions to be shown on "Featured Artist" section in the "Home" page
        $events = Event::all()->where('date_start', '>=', now())->sortBy('date_start')->take(3); // gets closest Events to be shown on "Next Events" section in the "Home" page
        $articles = Article::all()->sortByDesc('created_at')->take(2); // gets newest Articles to be shown on "Latest Articles" section in the "Home" page
        return view('home.index', ['artist' => $artist, 'event' => $event, 'events' => $events, 'articles' => $articles]);
    }
}
