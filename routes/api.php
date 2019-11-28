<?php

use Illuminate\Http\Request;
use App\User;
use App\Cart;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/checkUser", function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return response("", 200);
    } else {
        return response("", 403);
    }
});

Route::post("/addDisco", function (Request $request) {
    $cart = Cart::where("user_id", "=", $request->get("user_id"))->get();
    if (count($cart) > 0) {
        DB::table('album_cart')->insert(
            ['album_id' => $request->get("album_id"), "cart_id" => $cart[0]->id, "cantidad" => 1]
        );
        return response()->json(["cart_id" => $cart[0]->id]);
    } else {
        $newCart = Cart::insertGetId(
            ['user_id' => $request->get("user_id")]
        );
        DB::table('album_cart')->insert(
            ['album_id' => $request->get("album_id"), "cart_id" => $newCart, "cantidad" => 1]
        );
        return response()->json(["cart_id" => $newCart]);
    }
});
Route::post("/updateDisco", function (Request $request) {
    $cart = Cart::where("user_id", "=", $request->get("user_id"))->get();
    DB::table('album_cart')->where("cart_id", "=", $cart[0]->id)->where("album_id", "=", $request->get("album_id"))->update(
        ["cantidad" => $request->get("cantidad")]
    );
    return response()->json(["cart_id" => $cart[0]->id]);
});
Route::post("/destroyDisco", function (Request $request) {
    $cart = Cart::where("user_id", "=", $request->get("user_id"))->get();
    DB::table('album_cart')->where("cart_id", "=", $cart[0]->id)->where("album_id", "=", $request->get("album_id"))->delete();
    return response("OK", 200);
});
