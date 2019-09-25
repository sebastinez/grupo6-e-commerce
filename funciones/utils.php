<?php

/**
 * @function
 * @name isLogged
 * @description Chequea si esta seteada la variable uid en la session["usuario] y en el caso que no se manda al formulario de login
 */
function isLogged()
{
    if (!isset($_SESSION["usuario"]["uid"])) {
        header("Location: index.php?p=login");
    }
}


/**
 * @function
 * @name existeAvatar
 * @description Chequea si el usuario ya cargo una imagen de perfil o no.
 * @param {string} $uid El numero identificador del usuario.
 * @param {string} $fotoExtension La extension del avatar
 */
function existeAvatar($usuario)
{
    return isset($usuario["fotoExtension"]) && file_exists("img/" . $usuario["uid"] . "." . $usuario["fotoExtension"]);
}
