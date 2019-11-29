<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', url('/'));
});

Breadcrumbs::for('genre', function ($trail, $genre) {
    $trail->parent('home');
    $trail->push($genre->name, url('/genres'));
});

Breadcrumbs::for('album', function ($trail, $album) {
    $trail->parent('home');
    $trail->push($album->artist[0]->name, url('/artists/' . $album->artist[0]->id));
    $trail->push($album->name, url('/albums'));
});

Breadcrumbs::for('artist', function ($trail, $artist) {
    $trail->parent('home');
    $trail->push($artist->name, url('/artists/' . $artist->id));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push("Login", url('/login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push("Register", url('/register'));
});

Breadcrumbs::for('faq', function ($trail) {
    $trail->parent('home');
    $trail->push("FAQ", url('/faq'));
});

Breadcrumbs::for('contacto', function ($trail) {
    $trail->parent('home');
    $trail->push("Contacto", url('/contacto'));
});

Breadcrumbs::for('editPerfil', function ($trail) {
    $trail->parent('home');
    $trail->push("Edit User", url('/users'));
});

Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push("Carrito", url('/carrito/'));
});
