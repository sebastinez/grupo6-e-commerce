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
    public function index(Request $request)
    {
        $albums = Album::with('artist')->inRandomOrder()->simplePaginate(12);
        $genres = Genre::all();
        return view('home', ["ip" => $request->ip(), "genres" => $genres, "albums" => $albums]);
    }
    public function search(Request $request)
    {
        $albums = Album::where("name", "like", "%" . $request->get('q') . "%")->get();
        $artist = Artist::where("name", "like", "%" . $request->get('q') . "%")->get();
        $genre = Genre::where('name', "like", "%" . $request->get('q') . "%")->get();

        $result = [];
        if (count($albums) > 0) {
            $result["albums"] = ["name" => "Albums"];
            foreach ($albums as $value) {
                $result["albums"]["results"][] = ["title" => $value["name"], "url" => "/albums/" . $value["id"], "image" => $value["cover"]];
            }
        }
        if (count($artist) > 0) {
            $result["artists"] = ["name" => "Artists"];
            foreach ($artist as $value) {
                $result["artists"]["results"][] = ["title" => $value["name"], "url" => "/artists/" . $value["id"]];
            }
        }
        if (count($genre) > 0) {
            $result["genres"] = ["name" => "Genres"];
            foreach ($genre as $value) {
                $result["genres"]["results"][] = ["title" => $value["name"], "url" => "/genres/" . $value["id"]];
            }
        }

        return response()->json(["results" => $result]);
    }
}
