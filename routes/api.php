<?php


use Illuminate\Http\Request;
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

Route::middleware(["web"])->group(function () {
    Route::post("/addDisco", "CartController@store");
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
