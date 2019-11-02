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
    return view('home');
});

Route::get("/album/{id}", function ($id) {
    return view("album", ["id" => $id]);
});
Route::get("/albums/{genero}", function ($genero) {
    return view("albums", ["genero" => $genero]);
});

Route::get("/login", function () {
    return view("login");
});

Route::get("/register", function () {
    return view("register");
});
Route::get("/edit", function () {
    return view("edit_perfil");
});

Route::get("/perfil", function () {
    return view("perfil");
});

Route::get("/carrito", function () {
    return view("carrito");
});

Route::get("/faq", function () {
    return view("faq");
});

Route::get("/contact", function () {
    return view("contact");
});
Route::get("/passwordReset", function () {
    return view("password_reset");
});
