<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genres;
use App\Albums;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = Albums::with('artists')->paginate(30);
        $genres = Genres::all();
        return view('home', ["genres" => $genres, "albums" => $albums]);
    }
}
