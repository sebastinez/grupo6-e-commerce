<?php include("./includes/breadcrumb.php"); ?>
<div class="login">

    <?php

    if (isset($_GET["e"])) {
        $errores = json_decode($_GET["e"], true);
    }
    if (isset($_GET["post"])) {
        $post = json_decode($_GET["post"], true);
    }

    if (!$_POST) { ?>

        <div class="header">
            <h2>Olvido de contraseña</h2>
        </div>
        <form class="body" action="resetearPassword.php" method="POST">
            <div class="form-group">
                <input type="text" name="email" value="<?= $post["email"] ?? $_COOKIE["recordarUsuario"] ?>" class="form-control usuario <?php echo isset($errores["email"][0]) ? 'is-invalid' : "" ?>" placeholder="e-mail">
                <div class="invalid-feedback">
                    <?= $errores["email"][0] ?? '' ?>
                </div>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control usuario <?php echo isset($errores["password"][0]) ? 'is-invalid' : "" ?>" placeholder="Contraseña nueva">
                <div class="invalid-feedback">
                    <?= $errores["password"][0] ?? '' ?>
                </div>
            </div>

            <div class="form-group">
                <input type="password" name="passwordRepetida" class="form-control usuario" placeholder="Repetir contraseña nueva">
            </div>
            <button type="submit" class="btn btn-verde">Resetear contraseña</button>
        </form>

    <?php } ?>