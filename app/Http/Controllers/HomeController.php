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

        $result = [];
        if (count($albums) > 0) {
            foreach ($albums as $value) {
                $result[] = ["category" => "albums", "title" => $value["name"], "id" => $value["id"]];
            }
        }
        if (count($artist) > 0) {
            foreach ($artist as $value) {
                $result[] = ["category" => "artists", "title" => $value["name"], "id" => $value["id"]];
            }
        }
        if (count($genre) > 0) {
            foreach ($genre as $value) {
                $result[] = ["category" => "genres", "title" => $value["name"], "id" => $value["id"]];
            }
        }

        return response()->json($result);
    }
}
