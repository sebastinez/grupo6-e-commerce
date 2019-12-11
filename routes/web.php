<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@index");

Route::get("/faq", function () {
    return view("faq");
});
Route::get("/contact", "ContactController@index");
Route::post("/contact/send", "ContactController@send");

Route::get("/carrito", "CartController@index");
Route::post("/carrito/confirm", "CartController@confirm");

Route::get("/albums", "AlbumController@index");
Route::get("/albums/new", "AlbumController@create");
Route::get("/albums/{id}", "AlbumController@show");
Route::post("/albums", "AlbumController@store");
Route::get("/albums/{id}/edit", "AlbumController@edit");
Route::patch("/albums/{id}", "AlbumController@update");
Route::delete("/albums/{id}", "AlbumController@destroy");

Route::get("/artists", "ArtistController@index");
Route::get("/artists/new", "ArtistController@create");
Route::get("/artists/{id}", "ArtistController@show");
Route::post("/artists", "ArtistController@store");
Route::get("/artists/{id}/edit", "ArtistController@edit");
Route::patch("/artists/{id}", "ArtistController@update");
Route::delete("/artists/{id}", "ArtistController@destroy");

Route::get("/tracks", "TrackController@index");
Route::get("/tracks/new", "TrackController@create");
Route::get("/tracks/{id}", "TrackController@show");
Route::post("/tracks", "TrackController@store");
Route::get("/tracks/{id}/edit", "TrackController@edit");
Route::patch("/tracks/{id}", "TrackController@update");
Route::delete("/tracks/{id}", "TrackController@destroy");

Route::get("/genres", "GenreController@index");
Route::get("/genres/new", "GenreController@create");
Route::get("/genres/{id}", "GenreController@show");
Route::post("/genres", "GenreController@store");
Route::get("/genres/{id}/edit", "GenreController@edit");
Route::patch("/genres/{id}", "GenreController@update");
Route::delete("/genres/{id}", "GenreController@destroy");

Route::get("/users", "UserController@index");
Route::get("/users/new", "UserController@create");
Route::post("/users", "UserController@store");
Route::get("/users/edit", "UserController@edit");
Route::get("/users/{id}", "UserController@show");
Route::patch("/users", "UserController@update");
Route::delete("/users/{id}", "UserController@destroy");

Auth::routes();
Route::get("/logout", "\App\Http\Controllers\Auth\LoginController@logout");


Route::get('/init', function () {
    Artisan::call('storage:link');
    return 'ready!';
});
