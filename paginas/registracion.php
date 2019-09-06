<?php include("./includes/breadcrumb.php"); ?>
<h1 class="titulo-body">REGISTRACIÓN</h1>
<form action="paginas/auth.php" method="POST">
    <div class="registracion">
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group col-md-6">
                <label for="passwordRepetida">Repetir contraseña</label>
                <input type="password" name="passwordRepetida" class="form-control" id="passwordRepetida" placeholder="Contraseña" required>
            </div>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad" required>
            </div>
            <div class="form-group col-md-4">
                <label for="provincia">Provincia</label>
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
                <label for="codigoPostal">Codigo Postal</label>
                <input type="text" name="codigoPostal" class="form-control" id="codigoPostal" required>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" name="terminos" type="checkbox" id="terminos" required>
                <label class="form-check-label" for="terminos">
                    Acepto los <a href="#">terminos de condiciones</a> y la <a href="#">politica de privacidad</a>
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
</form>