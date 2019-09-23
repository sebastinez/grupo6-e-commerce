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
