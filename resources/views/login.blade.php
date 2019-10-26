@extends("index")

@section("nav")
@section("header")
@endsection

@section("content")
<?php

if ($_POST && isset($_POST["botonFinal"])) {
    header("Location: login.php");
}

?>
<div class="login">

    <?php

    if (!$_POST) { ?>

        <div class="header">
            <h2>¡Hola! Para seguir, <br>ingresá tu e-mail o usuario</h2>
        </div>
        <form class="body" action="?p=login" method="POST">
            <div class="form-group">
                <input type="text" name="email" value="<?= $_COOKIE["recordarUsuario"] ?? "" ?>" class="form-control usuario <?php echo isset($_GET["e"]) ? 'is-invalid' : "" ?>" placeholder="e-mail">
                <?php if (isset($_GET["e"])) { ?>
                    <div class="invalid-feedback">
                        Usuario y/o contraseña erronea<br>
                        <a href="?p=registracion">Quiero registrarme.</a>
                    </div>
                <?php } ?>
            </div>
            <div class="form-check">
                <input type="checkbox" name="recordar" id="recordar">
                <label class="form-check-label" for="recordar">
                    Recordar usuario
                </label>
            </div>
            <button type="submit" class="btn btn-verde">Ingresar</button>
            <a href="?p=passwordOlvidado" class="btn btn-naranja btn-sm">Olvide contraseña</a>
        </form>

    <?php } elseif (isset($_POST["email"])) {
        ?>

        <div class="header">
            <h2>Ahora, <br>tu contraseña</h2>
        </div>
        <form class="body" action="login.php" method="POST">
            <div class="form-group">
                <?php if (isset($_POST["recordar"])) : ?>
                    <input type="hidden" name="recordar" value="<?= $_POST["recordar"] ?>">
                <?php endif; ?>
                <input type="hidden" name="email" value="<?= $_POST["email"] ?>">
                <input type="password" name="password" class="form-control usuario" placeholder="contraseña">
            </div>
            <button type="submit" name="botonFinal" class="btn btn-verde">Ingresar</button>
        </form>

    <?php } ?>

    @endsection