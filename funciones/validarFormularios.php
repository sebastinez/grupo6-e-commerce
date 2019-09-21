<?php

require("funciones/manejoDB.php");


function estaCampoVacio($input, $nombre)
{
    if (strlen($input) === 0) return "Campo $nombre esta vacio";
    return false;
}

function validarMail($mail)
{
    $errores = [];
    $campoVacio = estaCampoVacio($mail, "correo electrónico");
    if ($campoVacio) $errores[] =  $campoVacio;
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) $errores[] =  "Mail provisto no tiene el formato correcto";
    if (count($errores) > 0) return $errores;
    return true;
}

//Luego de chequear que se relleno bien el formulario, se chequea con esta funcion si el usuario existe y la contraseña provista es la correcta.
function validarUsuario($param)
{
    foreach (obtenerUsuarios() as $valor) {
        if ($valor["email"] === $param["email"] && password_verify($param["password"], $valor["password"])) return $valor;
    }
    return false;
}

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

function validarNombre($nombre)
{
    $errores = [];
    $campoVacio = estaCampoVacio($nombre, "nombre");
    if ($campoVacio) $errores[] = $campoVacio;
    if (!ctype_alpha($nombre)) $errores[] = "Nombre se debe componer solo de caracteres alfabeticos";
    if (count($errores) > 0) return $errores;
    return true;
}

function validarApellido($apellido)
{
    $errores = [];
    $campoVacio = estaCampoVacio($apellido, "apellido");
    if ($campoVacio) $errores[] = $campoVacio;
    if (!ctype_alpha($apellido)) $errores[] = "Apellido se debe componer solo de characteres alfabeticos";
    if (count($errores) > 0) return $errores;
    return true;
}

function validarDireccion($direccion)
{
    $errores = [];
    $campoVacio = estaCampoVacio($direccion, "dirección");
    if ($campoVacio) $errores[] = $campoVacio;
    if (count($errores) > 0) return $errores;
    return true;
}

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

// Funcion para validar foto de perfil, que no pese mas que lo permitido y que sea el formato correcto, devuelve un arreglo con los errores
function validarFotoDePerfil($param)
{
    $errores = [];
    if ($param["error"] == 1) $errores[] = "Archivo pesa demasiado";
    if (!in_array(pathinfo($param["name"], PATHINFO_EXTENSION), ["jpg", "jpeg", "png"])) $errores[] = "No es el formato correcto, se admiten jpg, jpeg y png";
    if (count($errores) > 0) return $errores;
    return true;
}
