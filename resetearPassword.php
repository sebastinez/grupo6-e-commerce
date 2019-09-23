<?php

require("funciones/validarFormularios.php");

$password = validarContrasenia($_POST["password"], $_POST["passwordRepetida"]);
$email = validarMail($_POST["email"]);

if ($password === true && $email === true) {
    foreach (obtenerUsuarios() as $usuario) {
        if ($usuario["email"] === $_POST["email"] && $password === true && $email === true) {
            echo $usuario["email"] . " " . $_POST["email"] . "<br>";
            $usuario["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            modificarPassword($usuario);
            header("Location: index.php?p=login");
            die();
        }
    }
} else {
    $errores = ["password" => $password, "email" => $email];
    header("Location: index.php?p=passwordOlvidado&e=" . json_encode($errores) . "&post=" . json_encode($_POST));
}
