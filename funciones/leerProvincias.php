<?php

$data = "../data/provincias.json";

function obtenerProvincias()
{
    $prov = [];
    foreach (json_decode(file_get_contents($GLOBALS["data"]), true)["provincias"] as $provincia) {
        $prov[] = $provincia["nombre"];
    }
    return $prov;
}
