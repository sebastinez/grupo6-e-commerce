<?php

$db = "../data/usuarios.json";

// Devuelve un array associativo PHP del archivo usuarios.json
function obtenerUsuarios()
{
    return json_decode(file_get_contents($GLOBALS["db"]), true);
}

// Los parametros a esta funcion deben ser el array $_GET o $_POST
// La función devuelve todo el arreglo de usuario, lo cual es igual a true si pudo agregar el usuario
function agregarUsuario($param)
{
    if (isset($param["pwd"])) $param["pwd"] = hashPwd($param["pwd"]);
    $dbArray = obtenerUsuarios();
    $dbArray[] = $param;
    file_put_contents($GLOBALS["db"], json_encode($dbArray));
    return obtenerUsuarios();
}

//Luego de chequear que se relleno bien el formulario, se chequea con esta funcion si el usuario existe y la contraseña provista es la correcta.
function validarUsuario($param)
{
    foreach (obtenerUsuarios() as $valor) {
        if ($valor["usuario"] === $param["usuario"] && validarPwd(hashPwd($param["pwd"]), $valor["pwd"])) return true;
    }
    return false;
}

//Recibe un arreglo del formulario de modificación y cambia el elemento indicado del arreglo y lo vuelve a guardar
function modificarUsuario($param)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["usuario"] == $param["usuario"]) {
            $dbArray[$i] = $param;
            file_put_contents($GLOBALS["db"], json_encode($dbArray));
            return obtenerUsuarios();
        }
    }
    return "No se encontro el usuario";
}

//Recibe un arreglo del formulario de modificación y borra el elemento indicado del arreglo y lo vuelve a guardar
function borrarUsuario($param)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["usuario"] == $param["usuario"]) {
            unset($dbArray[$i]);
            file_put_contents($GLOBALS["db"], json_encode($dbArray));
            return obtenerUsuarios();
        }
    }
    return "No se encontro el usuario";
}

function hashPwd($pwd)
{
    return password_hash($pwd, PASSWORD_DEFAULT);
}

function validarPwd($input, $dbPwd)
{
    return password_verify($input, $dbPwd);
}
