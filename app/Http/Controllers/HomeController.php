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
        $albums = Album::where("name", "like", "%" . $request->get('query') . "%")->limit(15)->get();
        $artist = Artist::where("name", "like", "%" . $request->get('query') . "%")->limit(15)->get();
        $genre = Genre::where('name', "like", "%" . $request->get('query') . "%")->limit(15)->get();
        return json_encode(["albums" => $albums, "artists" => $artist, "genre" => $genre]);
    }
    public function show(Request $request)
    {
        switch ($request->get("type")) {
            case 'albums':
                $album = Album::find($request->get("id"));
                return view("albums.show", ["album" => $album]);
                break;
            case 'artists':
                $artist = Artist::with("album")->find($request->get("id"));
                return view("artist.show", ["artist" => $artist]);
                break;
            case 'genres':
                $genre = Genre::with("album")->find($request->get("id"));
                return view("genres.show", ["genre" => $genre]);
                break;
        }
    }
}
