<?php include("./includes/breadcrumb.php");

if (isset($_GET["e"])) {
    $errores = json_decode($_GET["e"], true);
}
if (isset($_GET["post"])) {
    $post = json_decode($_GET["post"], true);
}
?>

<div class="titulos">REGISTRACIÓN</div>
<form action="register.php" method="POST">
    <div class="registracion">
        <?php if (isset($errores["general"])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $errores["general"][0] ?>
            </div>
        <?php } ?>
        <div class="form-row">

            <div class="form-group col-md-6">
                <div class="input-class">
                    <input type="text" name="nombre" value="<?= $post["nombre"] ?? "" ?>" class="form-control <?php echo isset($errores["nombre"][0]) ? 'is-invalid' : "" ?>" id="nombre" placeholder="Nombre">
                    <div class="invalid-feedback">
                        <?= $errores["nombre"][0] ?? '' ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-class">
                    <input type="text" name="apellido" value="<?= $post["apellido"] ?? "" ?>" class="form-control <?php echo isset($errores["apellido"][0]) ? 'is-invalid' : "" ?>" id="apellido" placeholder="Apellido">
                    <div class="invalid-feedback">
                        <?= $errores["apellido"][0] ?? '' ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-class">
                <input type="text" name="email" value="<?= $post["email"] ?? "" ?>" class="form-control <?php echo isset($errores["email"][0]) ? 'is-invalid' : "" ?>" id="email" placeholder="Email">
                <div class="invalid-feedback">
                    <?= $errores["email"][0] ?? '' ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-class">
                    <input type="password" name="password" class="form-control <?php echo isset($errores["password"][0]) ? 'is-invalid' : "" ?>" id="password" placeholder="Contraseña">
                    <div class="invalid-feedback">
                        <?= $errores["password"][0] ?? '' ?>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-class">
                    <input type="password" name="passwordRepetida" class="form-control" id="passwordRepetida" placeholder="Repetir contraseña">
                </div>
            </div>
        </div>
        <div class="boton-registo">
            <button type="submit" class="btn btn-verde">Registrar</button>
        </div>
    </div>
</form>