<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(2)->sortByDesc('created_at');
        $events = Event::paginate(3)->sortBy('date_start');
        return view('index', ['events' => $events, 'articles' => $articles]);
    }

 
}
