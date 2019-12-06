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
        if (count($cart) > 0) {
            $albums = $cart[0]->getAlbumPaginatedAttribute();

            $precioTotal = array_reduce($cart[0]->album->toArray(), function ($total, $item) {
                $total += $item["precio"];
                return $total;
            });



            $artistasEnCarrito = [];
            foreach ($cart[0]->album as $album) {
                if (!array_search($album->artist[0]->name, $artistasEnCarrito))
                    $artistasEnCarrito[] = $album->artist[0]->name;
            }

            $relacionados = Album::whereHas("artist", function ($q) use ($artistasEnCarrito) {
                $q->whereIn("name", $artistasEnCarrito);
            })->inRandomOrder()->limit(12)->get();


            return view("carrito.show", [
                "cart" => $cart[0],
                "albums" => $albums,
                "subtotal" => $precioTotal,
                "relacionados" => $relacionados
            ]);
        } else {
            return view("carrito.show", [
                "cart" => [],
                "albums" => [],
                "subtotal" => 0,
                "relacionados" => []
            ]);
        }
    }
};
