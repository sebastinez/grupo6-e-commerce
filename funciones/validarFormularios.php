<?php

require("funciones/manejoDB.php");


/**
 * @function
 * @name estaCampoVacio
 * @description Chequea si la variable $input tiene un largo de 0 y devuelve un mensaje personalizado en caso afirmativo
 * @param {string} $input 
 * @param {string} $nombre Valor poner en mensaje a devolver en caso que este vacio
 * @return {string,bool(false)} Devuelve bool(false) en caso que no este vacio
 */
function estaCampoVacio($input, $nombre)
{
    if (strlen($input) === 0) return "Campo $nombre esta vacio";
    return false;
}

/**
 * @function
 * @name validarMail
 * @description Chequea si la variable $mail:
 *   - No este vacia
 *   - Sea del tipo mail
 * @param {string} $mail
 * @return {array($errores),bool(true)} 
 */
function validarMail($mail)
{
    $errores = [];
    $campoVacio = estaCampoVacio($mail, "correo electrónico");
    if ($campoVacio) $errores[] =  $campoVacio;
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) $errores[] =  "Mail provisto no tiene el formato correcto";
    if (count($errores) > 0) return $errores;
    return true;
}

/**
 * @function
 * @name validarUsuario
 * @description Chequea si existe el usuario:
 *   - Verificando si encuentra un mail y contraseña correspondiente 
 * @param {array} $param Arreglo $_POST que viene del formulario de login
 * @return {array(usuario),bool(false)} Devuelve el usuario indicado o en caso que no se encontro bool(false)
 */
function validarUsuario($param)
{
    foreach (obtenerUsuarios() as $valor) {
        if ($valor["email"] === $param["email"] && password_verify($param["password"], $valor["password"])) return $valor;
    }
    return false;
}

/**
 * @function
 * @name validarContrasenia
 * @description Chequea si $password cumple con los requerimientos siguientes:
 *   - Que no sea vacio
 *   - Que sea igual a $passwordRepetida
 *   - Que sea mayor a 6 caracteres
 * @param {strnig} $password
 * @param {string} $passwordRepetida 
 * @return {array($errores),bool(true)}
 */
function validarContrasenia($password, $passwordRepetida)
{
    $errores = [];
    $campoVacio = estaCampoVacio($password, "contraseña");
    if ($campoVacio) $errores[] = $campoVacio;
    if ($password !== $passwordRepetida) $errores[] = "Contraseñas no coinciden";
    if (strlen($password) <= 6) $errores[] = "Contraseña debe ser mayor a 6 caracteres";
    if (count($errores) > 0) return $errores;
    return true;
}

/**
 * @function
 * @name validarNombre
 * @description Chequea si $nombre cumple con los requerimientos siguientes:
 *   - Que no sea vacio
 *   - Que se componga de caracteres alfabeticos
 * @param {string} $nombre Valor de nombre a chequear.
 * @return {array($errores),bool(true)}
 */
function validarNombre($nombre)
{
    $errores = [];
    $campoVacio = estaCampoVacio($nombre, "nombre");
    if ($campoVacio) $errores[] = $campoVacio;
    if (!ctype_alpha($nombre)) $errores[] = "Nombre se debe componer solo de caracteres alfabeticos";
    if (count($errores) > 0) return $errores;
    return true;
}

/**
 * @function
 * @name validarApellido
 * @description Chequea si $apellido cumple con los requerimientos siguientes:
 *   - Que no sea vacio
 *   - Que se componga de caracteres alfabeticos
 * @param {string} $apellido Valor de apellido a chequear.
 * @return {array($errores),bool(true)}
 */
function validarApellido($apellido)
{
    $errores = [];
    $campoVacio = estaCampoVacio($apellido, "apellido");
    if ($campoVacio) $errores[] = $campoVacio;
    if (!ctype_alpha($apellido)) $errores[] = "Apellido se debe componer solo de characteres alfabeticos";
    if (count($errores) > 0) return $errores;
    return true;
}

/**
 * @function
 * @name validarDireccion
 * @description Chequea si $direccion cumple con los requerimientos siguientes:
 *   - Que no sea vacio
 * @param {string} $direccion
 * @return {array($errores),bool(true)}
 */
function validarDireccion($direccion)
{
    $errores = [];
    $campoVacio = estaCampoVacio($direccion, "dirección");
    if ($campoVacio) $errores[] = $campoVacio;
    if (count($errores) > 0) return $errores;
    return true;
}

/** 
 * @function
 * @name validarCodigoPostal
 * @description Chequea si $codigoPostal cumple con los requerimientos siguientes:
 *   - Que no sea vacio
 *   - Que tenga 4 caracteres
 *   - Que sea numerico
 * @param {string} $codigoPostal Valor de CodigoPostal a chequear.
 * @return {array($errores),bool(true)}
 */
function validarCodigoPostal($codigoPostal)
{
    $errores = [];
    $campoVacio = estaCampoVacio($codigoPostal, "codigo postal");
    if ($campoVacio) $errores[] = $campoVacio;
    if (strlen($codigoPostal) !== 4) $errores[] = "Codigo postal debe ser de 4 characteres";
    if (!is_numeric($codigoPostal)) $errores[] = "Codigo postal debe ser numerico";
    if (count($errores) > 0) return $errores;
    return true;
}
/**
 * @function
 * @name validarFotoDePerfil
 * @description Chequea si $codigoPostal cumple con los requerimientos siguientes:
 *   - Que no sea mas pesado de lo que permite php en php.ini
 *   - Que tenga extension jpg, jpeg o png
 * @param {array} $param Arreglo $_FILES
 * @return {array($errores),bool(true)}
 */
function validarFotoDePerfil($param)
{
    //Chequea el tamaño maximo del archivo que permite cargar php
    $filesize = [];
    preg_match('/\d*.\d*/', ini_get("upload_max_filesize"), $filesize);

    $errores = [];
    if (strlen($param["name"]) === 0) $errores[] = "Se debe subir una foto de perfil";
    if ($param["error"] == 1) $errores[] = "Archivo debe pesar menos de " . $filesize[0];
    if (!in_array(pathinfo($param["name"], PATHINFO_EXTENSION), ["jpg", "jpeg", "png"])) $errores[] = "No es el formato correcto, se admiten jpg, jpeg y png";
    if (count($errores) > 0) return $errores;
    return true;
}
