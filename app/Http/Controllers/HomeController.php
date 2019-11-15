<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Album;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = Album::with('artist')->inRandomOrder()->paginate(12);
        $genres = Genre::all();
        return view('home', ["genres" => $genres, "albums" => $albums]);
    }
}
