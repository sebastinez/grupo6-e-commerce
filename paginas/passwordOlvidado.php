<?php include("./includes/breadcrumb.php"); ?>
<div class="login">

    <?php

    if (!$_POST) { ?>

        <div class="header">
            <h2>Olvido de contraseña</h2>
        </div>
        <form class="body" action="resetearPassword.php" method="POST">
            <div class="form-group">
                <input type="text" name="email" value="<?= $_COOKIE["recordarUsuario"] ?? "" ?>" class="form-control usuario" placeholder="e-mail">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control usuario" placeholder="Contraseña nueva">
            </div>

            <div class="form-group">
                <input type="password" name="passwordRepetida" class="form-control usuario" placeholder="Repetir contraseña nueva">
            </div>
            <button type="submit" class="btn btn-verde">Resetear contraseña</button>
        </form>

    <?php } ?>