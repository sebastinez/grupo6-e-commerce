<?php

$db = "../data/usuarios.json";

// Devuelve un array associativo PHP del archivo usuarios.json
function obtenerUsuarios()
{
    return json_decode(file_get_contents($GLOBALS["db"]), true);
}

// Los parametros a esta funcion deben ser el array $_GET o $_POST
// La función devuelve true si pudo agregar el usuario
function agregarUsuario($param)
{
    if (isset($param["pwd"])) $param["pwd"] = hashPwd($param["pwd"]);
    $dbArray = obtenerUsuarios();
    $dbArray[] = $param;
    file_put_contents($GLOBALS["db"], json_encode($dbArray));
    return obtenerUsuarios();
}

//Luego de chequear que se relleno bien el formulario, se chequea con esta funcion si el usuario existe y la contraseña es la correcta.
function validarUsuario($param)
{
    foreach (obtenerUsuarios() as $valor) {
        if ($valor["usuario"] === $param["usuario"] && validarPwd($param["pwd"], $valor["pwd"])) return true;
    }
    return false;
}

function hashPwd($pwd)
{
    return password_hash($pwd, PASSWORD_DEFAULT);
}

function validarPwd($input, $dbPwd)
{
    return password_verify($input, $dbPwd);
}
