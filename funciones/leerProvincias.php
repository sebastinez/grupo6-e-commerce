<?php

$data = "./data/ciudades.json";

function obtenerProvincias()
{
    $prov = [];
    foreach (json_decode(file_get_contents($GLOBALS["data"]), true) as $provincia) {
        $prov[] = ["nombre" => $provincia["nombre"], "id" => $provincia["id"]];
    }
    return $prov;
}

function obtenerCiudades($id)
{
    foreach (json_decode(file_get_contents($GLOBALS["data"]), true) as $provincia) {
        if ($provincia["id"] == $id) return $provincia["ciudades"];
    }
}
