<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Album;
use App\Artist;

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
    public function search(Request $request)
    {
        $albums = Album::where("name", "like", "%" . $request->get('query') . "%")->get();
        $artist = Artist::where("name", "like", "%" . $request->get('query') . "%")->get();
        $genre = Genre::where('name', "like", "%" . $request->get('query') . "%")->get();
        return json_encode(["albums" => $albums, "artists" => $artist, "genre" => $genre]);
    }
}
