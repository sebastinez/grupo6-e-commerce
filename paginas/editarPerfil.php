<?php include("./includes/breadcrumb.php");
include("./funciones/leerProvincias.php");
$provincias = [];
$provincias[] = ["nombre" => "Seleccionar provincia", "id" => ""];
foreach (obtenerProvincias() as $provincia) {
    $provincias[] = $provincia;
}

$ciudades = obtenerCiudades(2)

?>
<div class="titulos">Editar perfil</div>

<form action="paginas/editarPerfil.php" method="POST">
    <div class="registracion">
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- <label for="email">Nombre</label> -->
                <div class="input-class">
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $usuario["nombre"] ?>" placeholder="Nombre" required>
                </div>
            </div>
            <div class="form-group col-md-6">
                <!-- <label for="email">Apellido</label> -->
                <div class="input-class">
                    <input type="text" name="apellido" class="form-control" id="apellido" value="<?= $usuario["apellido"] ?>" placeholder="Nombre" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <!-- <label for="email">E-Mail</label> -->
            <div class="input-class">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= $usuario["email"] ?>" required>
            </div>
        </div>
        <div class="form-group">
            <!-- <label for="direccion">Dirección</label> -->
            <div class="input-class">
                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="<?= $usuario["direccion"] ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- <label for="ciudad">Ciudad</label> -->
                <div class="input-class">
                    <select id="ciudad" name="ciudad" class="form-control" required>
                        <?php foreach ($ciudades as $ciudad) : ?>
                            <option value="<?= $ciudad["id"] ?> "><?= $ciudad["nombre"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <!-- <label for="provincia">Provincia</label> -->
                <select id="provincia" name="provincia" class="form-control" required>
                    <?php foreach ($provincias as $provincia) { ?>
                        <option value="<?= $provincia["id"] ?>"><?= $provincia["nombre"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <!-- <label for="codigoPostal">C.P.</label> -->
                <div class="input-class">
                    <input type="text" name="codigoPostal" placeholder="Codigo Postal" class="form-control" value="<?= $usuario["codigoPostal"] ?>" id="codigoPostal" required>
                </div>
            </div>
        </div>
        <div class="boton-registo">
            <button type="submit" class="btn btn-verde">Guardar cambios</button>
        </div>
    </div>
</form>