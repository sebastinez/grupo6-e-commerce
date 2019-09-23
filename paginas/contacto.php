<?php include("./includes/breadcrumb.php");
require("./funciones/validarFormularios.php");
$exito = false;
$mensaje = false;
$nombre = false;
$email = false;

if ($_POST) {
    $nombre = validarNombre($_POST["name"]);
    $email = validarMail($_POST["email"]);
    $mensaje = estaCampoVacio($_POST["message"], "Mensaje");
    if ($nombre === true && $email === true && $mensaje === false) {
        $exito = true;
        ?>
        <div class="titulos">Se envío existosamente su consulta!</div>
        <div class="registracion">
            <p class="text-center"><a href="index.php" class="center text-white">Volver a la pagina principal</a></p>
        </div>
    <?php }
    }
    if ($exito === false) {
        ?>
    <div class="titulos">Formulario de contacto</div>
    <div class="contacto container">
        <div class="form-group">
            <form action="?p=contacto" method="POST" class="form">
                <div class="form-group">
                    <!-- <label for="name">Nombre</label> -->
                    <input name="name" type="text" class="form-control input <?php echo $nombre[0] ? 'is-invalid' : "" ?>" placeholder="Nombre" value="<?= $_POST["name"] ?? "" ?>" id="name" />
                    <div class="invalid-feedback">
                        <?= $nombre[0] ?? '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="email">Email</label> -->
                    <input name="email" type="text" class="form-control input <?php echo $email[0] ? 'is-invalid' : "" ?>" value="<?= $_POST["email"] ?? "" ?>" id="email" placeholder="Email" />
                    <div class="invalid-feedback">
                        <?= $email[0] ?? '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="comment">Mensaje</label> -->
                    <textarea name="message" rows="5" class="form-control input <?php echo $mensaje[0] ? 'is-invalid' : "" ?>" value="<?= $_POST["message"] ?? "" ?>" id="comment" placeholder="Mensaje"></textarea>
                    <div class="invalid-feedback">
                        <?= $mensaje ?? '' ?>
                    </div>
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-lg btn-naranja">Enviar</button>
                </div>
        </div>
    </div>
<?php } ?>