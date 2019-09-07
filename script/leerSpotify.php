<?php

function leerArchivosJson($archivo)
{
    $jsonString = file_get_contents($archivo);
    $phpArray = json_decode($jsonString, true);
    return $phpArray["albums"];
}

function filtrarArtista($array)
{
    return [
        "id" => $array["artists"][0]["id"],
        "nombre" => $array["artists"][0]["name"]
    ];
}

function filtrarAlbum($array)
{
    return [
        "id" => $array["id"],
        "imagen" => $array["images"][1]["url"],
        "imagenSize" => $array["images"][1]["width"],
        "nombre" => $array["name"],
        "estreno" => $array["release_date"],
        "tracks" => $array["total_tracks"]
    ];
}

function filtrarCanciones($array)
{
    $canciones = [];
    foreach ($array["tracks"]["items"] as $cancion) {
        $canciones[] = [
            "nombre" => $cancion["name"],
            "preview" => $cancion["preview_url"],
            "numero" => $cancion["track_number"],
            "id" => $cancion["id"]
        ];
    }
    return $canciones;
}

foreach (leerArchivosJson("../data/pruebaspotify.json") as $valor) {
    echo "<pre>";

    echo "<h1>Información discos de pruebasSpotify.Json</h1>";

    echo "<h3>Informacion</h3>";
    print_r(filtrarAlbum($valor));

    echo "<h3>Canciones</h3>";
    print_r(filtrarCanciones($valor));

    echo "<h3>Artista</h3>";
    print_r(filtrarArtista($valor));
    echo "</pre>";
};
