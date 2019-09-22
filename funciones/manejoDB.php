<?php

$db = "./data/usuarios.json";

// Devuelve un array associativo PHP del archivo usuarios.json
function obtenerUsuarios()
{
    return json_decode(file_get_contents($GLOBALS["db"]), true);
}

function obtenerUsuarioIndividual($uid)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["uid"] == $uid) {
            return $dbArray[$i];
        }
    }
}

// Los parametros a esta funcion deben ser el array $_GET o $_POST
// La función devuelve todo el arreglo de usuario, lo cual es igual a true si pudo agregar el usuario
function agregarUsuario($param)
{
    $errores = [];
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["email"] == $param["email"]) {
            $errores["email"] = ["Ya existe un usuario con este correo"];
            return $errores;
        }
    }
    if (isset($param["password"])) $param["password"] = password_hash($param["password"], PASSWORD_DEFAULT);;
    $param["uid"] = uniqid();
    unset($param["passwordRepetida"]);
    $dbArray[] = $param;
    file_put_contents($GLOBALS["db"], json_encode($dbArray), JSON_PRETTY_PRINT);
    return obtenerUsuarioIndividual($param["uid"]);
}


//Recibe un arreglo del formulario de modificación y cambia el elemento indicado del arreglo y lo vuelve a guardar
function modificarUsuario($param)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["uid"] == $_SESSION["usuario"]["uid"]) {
            $dbArray[$i] = array_merge(["password" => $dbArray[$i]["password"]], ["uid" => $dbArray[$i]["uid"]], ["discos" => ["42hCHiMtfs7mfBTVX3V6k7", "3HpFr2EeE38hr706Rxtmjy", "2OU9Ot1KmE6qRzVAhiNqkD"]], $param);
            file_put_contents($GLOBALS["db"], json_encode($dbArray), JSON_PRETTY_PRINT);
            return $dbArray[$i];
        }
    }
}

//Recibe un arreglo del formulario de modificación y cambia el elemento indicado del arreglo y lo vuelve a guardar
function modificarPassword($param)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["uid"] == $param["uid"]) {
            $dbArray[$i]["password"] = $param["password"];
            file_put_contents($GLOBALS["db"], json_encode($dbArray), JSON_PRETTY_PRINT);
            return obtenerUsuarios();
        }
    }
}

//Recibe un arreglo del formulario de modificación y borra el elemento indicado del arreglo y lo vuelve a guardar
function borrarUsuario($uid)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["uid"] == $uid) {
            unset($dbArray[$i]);
            file_put_contents($GLOBALS["db"], json_encode($dbArray), JSON_PRETTY_PRINT);
            return obtenerUsuarios();
        }
    }
    return "No se encontro el usuario";
}
