<?php
require("./funciones/fileUpload.php");
require("./funciones/validarFormularios.php");
include("./includes/breadcrumb.php");
require("./data/generos.php");

//Obtención de provincias y ciudades para formulario
include("./funciones/leerProvincias.php");
$provincias[] = ["nombre" => "Seleccionar provincia", "id" => ""];


if (isset($_SESSION["usuario"]["provincia"])) {
    $provinciaUsuario = $_SESSION["usuario"]["provincia"];
} else {
    $provinciaUsuario = "";
}

foreach (obtenerProvincias() as $provincia) {
    $provincias[] = $provincia;
}

if (!isset($_SESSION["usuario"]["ciudad"])) {
    $ciudades[] = ["nombre" => "Seleccionar ciudad", "id" => " "];
    $_SESSION["usuario"]["ciudad"] = " ";
}

foreach (obtenerCiudades(2) as $ciudad) {
    $ciudades[] = $ciudad;
}

if (isset($_SESSION["usuario"]["generos"])) {
    $generosFavorito = $_SESSION["usuario"]["generos"];
} else {
    $generosFavorito = [];
}

//Manejo de datos POST de formulario
$nombre = false;
$apellido = false;
$email = false;
$codigoPostal = false;
$direccion = false;
$fotoPerfil = false;
$errProvincia = false;
$exito = false;

if ($_POST) {
    $nombre = validarNombre($_POST["nombre"]);
    $apellido = validarApellido($_POST["apellido"]);
    $email = validarMail($_POST["email"]);
    $codigoPostal = validarCodigoPostal($_POST["codigoPostal"]);
    $direccion = validarDireccion($_POST["direccion"]);
    $errProvincia = validarProvincia($_POST["provincia"]);
    $fotoPerfil = validarFotoDePerfil($_FILES["avatar"]);

    if (isset($_POST["provincia"]) && strlen($_POST["provincia"]) !== 0) {
        $provinciaUsuario = $_POST["provincia"];
    }

    if ($nombre === true && $apellido === true && $email === true && $codigoPostal === true && $errProvincia === true && $direccion === true && $fotoPerfil === true) {
        $exito = true;
        $usuarioModificado = modificarUsuario($_POST, $_FILES["avatar"]);
        cargarAvatar($_FILES["avatar"], $usuarioModificado["uid"]);
        $_SESSION["usuario"] = $usuarioModificado; ?>
        <div class="titulos">Se edito exitosamente tu perfil!</div>
        <div class="registracion">
            <p class="text-center"><a href="index.php" class="center text-white">Volver a la pagina principal</a></p>
        </div>

    <?php
        }
    }
    if ($exito !== true) { ?>

    <div class="titulos">Editar perfil</div>

    <form action="?p=editarPerfil" method="POST" enctype="multipart/form-data">
        <div class="registracion inputEditarPerfil">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Nombre</label>
                    <input type="text" name="nombre" class="form-control <?php echo $nombre[0] ? 'is-invalid' : "" ?>" id="nombre" value="<?= $_POST["nombre"] ?? $_SESSION["usuario"]["nombre"] ?>" placeholder="Nombre">
                    <div class="invalid-feedback">
                        <?= $nombre[0] ?? '' ?>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Apellido</label>
                    <input type="text" name="apellido" class="form-control <?php echo $apellido[0] ? 'is-invalid' : "" ?>" id="apellido" value="<?= $_POST["apellido"] ?? $_SESSION["usuario"]["apellido"] ?>" placeholder="Nombre">
                    <div class="invalid-feedback">
                        <?= $apellido[0] ?? '' ?>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <div class="input-class">
                    <input type="text" name="email" class="form-control <?php echo $email[0] ? 'is-invalid' : "" ?>" id="email" placeholder="Email" value="<?= $_POST["email"] ?? $_SESSION["usuario"]["email"] ?>">
                    <div class="invalid-feedback">
                        <?= $email[0] ?? '' ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <div class="input-class">
                    <input type="text" name="direccion" class="form-control <?php echo $direccion[0] ? 'is-invalid' : "" ?>" id="direccion" placeholder="Dirección" value="<?= $_POST["direccion"] ?? $_SESSION["usuario"]["direccion"] ?? "" ?>">
                    <div class="invalid-feedback">
                        <?= $direccion[0] ?? '' ?>
                    </div>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-8">
                    <label for="provincia">Provincia</label>
                    <select id="provincia" name="provincia" class="form-control <?php echo $errProvincia[0] ? 'is-invalid' : "" ?>">
                        <?php foreach ($provincias as $provincia) : ?>
                            <option <?php echo $provincia["id"] == $provinciaUsuario ? "selected" : ""; ?> value="<?= $provincia["id"] ?>"><?= $provincia["nombre"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $errProvincia[0] ?? '' ?>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="codigoPostal">C.P.</label>
                    <div class="input-class">
                        <input type="text" name="codigoPostal" placeholder="Codigo Postal" class="form-control  <?php echo $codigoPostal[0] ? 'is-invalid' : "" ?>" value="<?= $_POST["codigoPostal"] ?? $_SESSION["usuario"]["codigoPostal"] ?? "" ?>" id="codigoPostal">
                        <div class="invalid-feedback">
                            <?= $codigoPostal[0] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="avatar">Imagen de usuario</label>
                <input type="file" value="Cambiar imagen" class="form-control-file <?php echo $fotoPerfil[0] ? 'is-invalid' : "" ?>" name="avatar">
                <div class="invalid-feedback">
                    <?= $fotoPerfil[0] ?? '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="generos">Generos favoritos</label>
                <select multiple name="generos[]" class="form-control" id="generos">
                    <?php foreach ($generos as $genero) : ?>
                        <option <?php echo in_array($genero["genero"], $generosFavorito) ? "selected" : ""; ?> value="<?= $genero["genero"] ?>"><?= $genero["genero"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="boton-registo">
                <button type="submit" class="btn btn-verde">Guardar cambios</button>
            </div>
        </div>
    </form>
<?php } ?>