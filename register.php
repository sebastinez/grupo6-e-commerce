<?php
require("./funciones/validarFormularios.php");

if ($_POST) {

    $nombre = validarNombre($_POST["nombre"]);
    $apellido = validarApellido($_POST["apellido"]);
    $email = validarMail($_POST["email"]);
    $password = validarContrasenia($_POST["password"], $_POST["passwordRepetida"]);

    if ($nombre === true && $apellido === true && $email === true && $password === true) {
        $usuario = agregarUsuario($_POST);
        if ($usuario["email"][0] === "Ya existe un usuario con este correo") {
            header("Location:index.php?p=registracion&e=" . json_encode($usuario) . "&post=" . json_encode($_POST));
            die();
        }
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php");
    } else {
        unset($_POST["password"]);
        unset($_POST["passwordRepetida"]);
        $errores = ["nombre" => $nombre, "apellido" => $apellido, "email" => $email, "password" => $password];
        header("Location:index.php?p=registracion&e=" . json_encode($errores) . "&post=" . json_encode($_POST));
    }
}
