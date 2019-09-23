<?php

/**
 * @function
 * @name cargarAvatar
 * @description Guarda imagen de perfil subida por el usuario en la carpeta img con el nombre de la uid del usuario y la extension del archivo del usuario
 * @param {array} $file El arreglo $_FILES["nombre de campo de archivo"]
 * @param {string} $uid El numero identificador del usuario.
 */
function cargarAvatar($file, $uid)
{
    $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
    move_uploaded_file($file["tmp_name"], "img/$uid.$extension");
}
