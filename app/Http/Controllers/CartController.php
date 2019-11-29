<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Album;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('cart')) {

            $cart = $request->session()->get("cart");
            $cart_albums = array_map(function ($album) {
                return $album["id"];
            }, $cart["albums"]);

            $albums = Album::with("artist")->whereIn("id", $cart_albums)->paginate(12);

            foreach ($albums as $album) {
                $album->cantidad = 1;
            }
        } else {
            return view("carrito.show", ["albums" => []]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', ["albums" => []]);
        }
        $cart = $request->session()->get("cart");

        $cart["albums"][] = ["id" => $request->get("id"), "q" => $request->get("q")];

        $request->session()->put('cart', $cart);
        return response()->json(["message" => $cart]);
    }
}
