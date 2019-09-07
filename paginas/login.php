<?php include("./includes/breadcrumb.php"); ?>
<div class="login">

    <?php if (!$_POST) { ?>

        <div class="header">
            <h2>¡Hola! Para seguir, <br>ingresá tu e-mail o usuario</h2>
        </div>
        <form class="body" action="?p=login" method="POST">
            <div class="form-group">
                <input type="text" name="usuario" class="form-control usuario" placeholder="e-mail o usuario">
            </div>
            <button type="submit" class="btn btn-verde">Ingresar</button>
        </form>

    <?php } elseif (isset($_POST["usuario"])) { ?>

        <div class="header">
            <h2>Ahora, <br>tu contraseña</h2>
        </div>
        <form class="body" action="paginas/auth.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="usuario" value="<?= $_POST["usuario"] ?>">
                <input type="password" name="pwd" class="form-control usuario" placeholder="e-mail o usuario">
            </div>
            <button type="submit" class="btn btn-verde">Ingresar</button>
        </form>

    <?php } ?>