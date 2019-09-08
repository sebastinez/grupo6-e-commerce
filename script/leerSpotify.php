<?php

function leerArchivosJson($archivo)
{
    $jsonString = file_get_contents($archivo);
    $phpArray = json_decode($jsonString, true);
    return $phpArray["albums"];
}

function searchAlbum($albumes, $id)
{
    foreach ($albumes as $album) {
        if ($album["general"]["id"] === $id) {
            return $album;
        }
    }
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
        "precio" => $array["precio"],
        "estreno" => $array["release_date"],
        "tracks" => $array["total_tracks"],
        "artista" => $array["name"]
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



function getSpotify(...$archivos)
{
    $albumes = [];
    foreach ($archivos as $archivo) {
        foreach (leerArchivosJson($archivo) as $album) {
            $albumes[] = [
                "general" => filtrarAlbum($album),
                "artista" => filtrarArtista($album),
                "canciones" => filtrarCanciones($album)
            ];
        }
    }
    return $albumes;
}
