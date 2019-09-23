<?php

/**
 * @function
 * @name leerArchivosJson
 * @description Lee un archivo json
 * @param {string} $archivo Ruta de archivo json de generos
 * @return {array} Devuelve un arreglo con los discos listados en ese json
 */
function leerArchivosJson($archivo)
{
    $jsonString = file_get_contents($archivo);
    $phpArray = json_decode($jsonString, true);
    return $phpArray["albums"];
}

/**
 * @function
 * @name searchAlbum
 * @description Busca un disco dentro de los discos provistos por su id
 * @param {array} $albumes Arreglo de discos obtenidos por leerArchivosJson
 * @param {string} $id Identificador de disco a buscar
 * @return {array} Devuelve el arreglo del disco en busqueda
 */
function searchAlbum($albumes, $id)
{
    foreach ($albumes as $album) {
        if ($album["general"]["id"] === $id) {
            return $album;
        }
    }
}

/**
 * @function
 * @name searchMultipleAlbums
 * @description Busca multiples discos dentro de los discos provistos por sus ids guardados en un arreglo
 * @param {array} $albumes Arreglo de discos obtenidos por leerArchivosJson
 * @param array $id Arreglo de identificadores de discos a buscar
 * @return {array} Devuelve el arreglo de los discos a buscar
 */
function searchMultipleAlbums($albumes, $id)
{
    $albumesARetonar = [];
    foreach ($albumes as $album) {

        if (in_array($album["general"]["id"], $id)) {
            $albumesARetonar[] = $album;
        }
    }
    return $albumesARetonar;
}

/**
 * @function
 * @name filtrarArtista
 * @description Filtra los arreglos provistos por getSpotify por sus artistas
 * @param {array} $array Arreglo de uno o multiples json de discos
 * @return {array} Devuelve un arreglo de los artistas contenidos en el json
 */
function filtrarArtista($array)
{
    return [
        "id" => $array["artists"][0]["id"],
        "nombre" => $array["artists"][0]["name"]
    ];
}

/**
 * @function
 * @name filtrarAlbum
 * @description Filtra los arreglos provistos por getSpotify por sus discos
 * @param {array} $array Arreglo de uno o multiples json de discos
 * @return {array} Devuelve un arreglo de los discos contenidos en el json
 */
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

/**
 * @function
 * @name filtrarCanciones
 * @description Filtra los arreglos provistos por getSpotify por sus canciones
 * @param {array} $array Arreglo de uno o multiples json de discos
 * @return {array} Devuelve un arreglo de las canciones contenidos en el json
 */
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

/**
 * @function
 * @name getSpotify
 * @description Lee el archivo json solicitado y devuelve un arreglo emprolijado de esa informacion
 * @param {string,array} $archivos Uno o multiples archivos de json obtenidos de la API de Spotify
 * @return {array} Devuelve un arreglo con informacion general, el genero, artistas y canciones obtenidas del json
 */
function getSpotify(...$archivos)
{
    $albumes = [];
    foreach ($archivos as $archivo) {
        foreach (leerArchivosJson("./data/$archivo.json") as $album) {
            $albumes[] = [
                "general" => filtrarAlbum($album),
                "genero" => $archivo,
                "artista" => filtrarArtista($album),
                "canciones" => filtrarCanciones($album)
            ];
        }
    }
    return $albumes;
}
