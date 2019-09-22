<?php

require("funciones/validarFormularios.php");

foreach (obtenerUsuarios() as $usuario) {
    if ($usuario["email"] === $_POST["email"] && validarContrasenia($_POST["password"], $_POST["passwordRepetida"]) === true && validarMail($_POST["email"] === true)) {
        echo $usuario["email"] . " " . $_POST["email"] . "<br>";
        $usuario["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        modificarPassword($usuario);
        header("Location: index.php?p=login");
        die();
    }
}

header("Location: index.php?p=login&e=true");
