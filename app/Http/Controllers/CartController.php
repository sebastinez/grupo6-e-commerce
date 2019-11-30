<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Album;
use App\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = Cart::with("album")->where("user_id", "=", $request->ip())->get();
        $albums = $cart[0]->getAlbumPaginatedAttribute();
        return view("carrito.show", ["cart" => $cart[0], "albums" => $albums]);
    }
};
