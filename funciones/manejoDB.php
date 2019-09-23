<?php

$db = "./data/usuarios.json";

/**
 * @function
 * @name obtenerUsuarios
 * @description Devuelve un array associativo conteniendo todos los usuarios guardados en el archivo usuarios.json
 * @return {array} Devuelve un arreglo con todos los usuarios guardados en usuarios.json
 */
function obtenerUsuarios()
{
    return json_decode(file_get_contents($GLOBALS["db"]), true);
}

/**
 * @function
 * @name obtenerUsuarioIndividual
 * @description Devuelve un array associativo conteniendo un usuario especifico por uid
 * @param {string} $id Identificador del usuario
 * @return {array} Devuelve un arreglo con un usuarios buscado por uid
 */
function obtenerUsuarioIndividual($uid)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["uid"] == $uid) {
            return $dbArray[$i];
        }
    }
}

/**
 * @function
 * @name obtenerUsuarioIndividual
 * @description Devuelve un array associativo conteniendo un usuario especifico por uid
 * @param {array} $param Arreglo $_POST que se recibe luego de que el usuario envie el formulario de registracion y la informacion este validada.
 * @return {array} Devuelve el usuario que fue agregado a la base de datos para iniciar la sesion del mismo.
 */
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

/**
 * @function
 * @name modificarUsuario
 * @description Recibe un arreglo del formulario de edición de perfil y cambia el usuario indicado del arreglo y lo vuelve a guardar
 * @param {array} $param Arreglo $_POST que se recibe luego de que el usuario envie el formulario de edición de perfil y la informacion este validada.
 * @return {array} Devuelve el usuario que fue agregado a la base de datos
 */
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

/**
 * @function
 * @name modificarPassword
 * @description Recibe un arreglo del formulario de olvido de contraseña, busca el usuario indicado y le cambia la contraseña por una contraseña nueva hasheada
 * @param {array} $param - Arreglo $_POST que se recibe luego de que el usuario envie el formulario de olvido de contraseña
 */
function modificarPassword($param)
{
    $dbArray = obtenerUsuarios();
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]["uid"] == $param["uid"]) {
            $dbArray[$i]["password"] = $param["password"];
            file_put_contents($GLOBALS["db"], json_encode($dbArray), JSON_PRETTY_PRINT);
        }
    }
}

/*
 * @function
 * @name borrarUsuario
 * @description Recibe un uid de identificacion, lee la base de datos, borra el usuario de la base de datos y la vuelve a guardar
 * @param {string} $uid Identificador de usuario
 */
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
