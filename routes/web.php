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

Route::get('/', function () {
    return "Bienvenido";
});

Route::get("/albums", "AlbumsController@index");
Route::get("/albums/new", "AlbumsController@create");
Route::get("/albums/{id}", "AlbumsController@show");
Route::post("/albums", "AlbumsController@store");
Route::get("/albums/{id}/edit", "AlbumsController@edit");
Route::patch("/albums/{id}", "AlbumsController@update");
Route::delete("/albums/{id}", "AlbumsController@destroy");

Route::get("/artists", "ArtistsController@index");
Route::get("/artists/new", "ArtistsController@create");
Route::get("/artists/{id}", "ArtistsController@show");
Route::post("/artists", "ArtistsController@store");
Route::get("/artists/{id}/edit", "ArtistsController@edit");
Route::patch("/artists/{id}", "ArtistsController@update");
Route::delete("/artists/{id}", "ArtistsController@destroy");

Route::get("/tracks", "TracksController@index");
Route::get("/tracks/new", "TracksController@create");
Route::get("/tracks/{id}", "TracksController@show");
Route::post("/tracks", "TracksController@store");
Route::get("/tracks/{id}/edit", "TracksController@edit");
Route::patch("/tracks/{id}", "TracksController@update");
Route::delete("/tracks/{id}", "TracksController@destroy");

Route::get("/genres", "GenresController@index");
Route::get("/genres/new", "GenresController@create");
Route::get("/genres/{id}", "GenresController@show");
Route::post("/genres", "GenresController@store");
Route::get("/genres/{id}/edit", "GenresController@edit");
Route::patch("/genres/{id}", "GenresController@update");
Route::delete("/genres/{id}", "GenresController@destroy");
