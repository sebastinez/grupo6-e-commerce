<?php

require("funciones/validarFormularios.php");



$resultado = validarUsuario($_POST);

if ($resultado !== false) {
    if (isset($_POST["recordar"])) {
        setcookie("recordarUsuario", $_POST["email"], time() + 60 * 60 * 24 * 7);
    }
    session_start();
    $_SESSION["usuario"] = $resultado;
    header("Location: index.php");
} else {
    header("Location: index.php?p=login&e=true");
}
