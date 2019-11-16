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
        //Hay que emprolijar....
        switch ($request->get("type")) {
            case 'album':
                $albums = Album::where("name", "like", "%" . $request->get('query') . "%")->with("artist")->get();
                return view("albums.index", ["albums" => $albums]);
                break;
            case 'artist':
                $artist = Artist::where("name", "like", "%" . $request->get('query') . "%")->get();
                return view("artist.index", ["artist" => $artist]);
                break;
            case 'genre':
                $genreRaw = Genre::where("name", "like", "%" . $request->get('query') . "%")->with("album")->first();
                $genre = Album::where('genre_id', $genreRaw->id)->with('genre', 'artist')->get();
                return view("genre.show", ["genre" => $genre]);
                break;
        }
    }
}
