<?php

$data = "./data/ciudades.json";

/**
 * @function
 * @name obtenerProvincias
 * @description Lee el archivo ciudades.json y devuelve un arreglo de las provincias con nombre y id de cada provincia
 * @return {array} Devuelve arreglo de provincias
 */
function obtenerProvincias()
{
    $prov = [];
    foreach (json_decode(file_get_contents($GLOBALS["data"]), true) as $provincia) {
        $prov[] = ["nombre" => $provincia["nombre"], "id" => $provincia["id"]];
    }
    return $prov;
}

/**
 * @function
 * @name obtenerCiudades
 * @description Lee el archivo ciudades.json y devuelve un arreglo de las ciudades correspondientes a la provincia con nombre y id de cada ciudad
 * @param {string} $id Id de la provincia
 */
function obtenerCiudades($id)
{
    foreach (json_decode(file_get_contents($GLOBALS["data"]), true) as $provincia) {
        if ($provincia["id"] == $id) return $provincia["ciudades"];
    }
}
