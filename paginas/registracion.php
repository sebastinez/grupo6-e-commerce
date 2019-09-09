<?php include("./includes/breadcrumb.php"); ?>
<div class="titulos">REGISTRACIÓN</div>
<form action="paginas/auth.php" method="POST">
    <div class="registracion">
        <div class="form-group">
            <!-- <label for="email">E-Mail</label> -->
            <div class="input-class">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- <label for="password">Contraseña</label> -->
                <div class="input-class">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="form-group col-md-6">
                <!-- <label for="passwordRepetida">Repetir contraseña</ label>-->
                <div class="input-class">
                    <input type="password" name="passwordRepetida" class="form-control" id="passwordRepetida" placeholder="Contraseña" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <!-- <label for="direccion">Dirección</label> -->
            <div class="input-class">
                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- <label for="ciudad">Ciudad</label> -->
                <div class="input-class">
                    <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad" required>
                </div>
            </div>
            <div class="form-group col-md-4">
                <!-- <label for="provincia">Provincia</label> -->
                <select id="provincia" name="provincia" class="form-control" required>
                    <option selected>Seleccionar...</option>
                    <option>Ciudad Autonoma de Buenos Aires</option>
                    <option>Buenos Aires</option>
                    <option>Entre Rios</option>
                    <option>Mendoza</option>
                    <option>Cordoba</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <!-- <label for="codigoPostal">C.P.</label> -->
                <div class="input-class">
                    <input type="text" name="codigoPostal" class="form-control" id="codigoPostal" required>
                </div>
            </div>
        </div>
        <div class="form-group container no-margin-left">
            <div class="form-check">
                <input class="form-check-input" name="terminos" type="checkbox" id="terminos" required>
                <label class="form-check-label" for="terminos">
                    <p>
                        Acepto los <a href="?p=terminos">terminos de condiciones</a> y la <a href="?p=privacidad">politica de privacidad</a></p>
                </label>
            </div>
        </div>
        <div class="boton-registo">
            <button type="submit" class="btn btn-verde">Registrar</button>
        </div>
    </div>
</form>