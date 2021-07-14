<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $members = Member::all()->sortBy('name');
        return view('about.index', ['members' => $members]);
    }
}
