<?php include("./includes/breadcrumb.php");

include("./funciones/validarFormularios.php"); ?>
<div class="login">



    <?php

    if ($_POST && isset($_POST["botonFinal"])) {
        var_dump(validarUsuario($_POST));
    }

    if (!$_POST) { ?>

        <div class="header">
            <h2>¡Hola! Para seguir, <br>ingresá tu e-mail o usuario</h2>
        </div>
        <form class="body" action="?p=login" method="POST">
            <div class="form-group">
                <input type="text" name="email" class="form-control usuario" placeholder="e-mail">
            </div>
            <button type="submit" class="btn btn-verde">Ingresar</button>
        </form>

    <?php } elseif (isset($_POST["email"])) { ?>

        <div class="header">
            <h2>Ahora, <br>tu contraseña</h2>
        </div>
        <form class="body" action="?p=login" method="POST">
            <div class="form-group">
                <input type="hidden" name="email" value="<?= $_POST["email"] ?>">
                <input type="password" name="pwd" class="form-control usuario" placeholder="contraseña">
            </div>
            <button type="submit" name="botonFinal" class="btn btn-verde">Ingresar</button>
        </form>

    <?php } ?>