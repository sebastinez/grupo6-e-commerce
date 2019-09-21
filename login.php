<?php

require("funciones/validarFormularios.php");

$resultado = validarUsuario($_POST);

if ($resultado !== false) {
    session_start();
    $_SESSION["usuario"] = $resultado;
    header("Location: index.php");
} else {
    header("Location: index.php?p=login&e=true");
}
