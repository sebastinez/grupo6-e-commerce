@extends('index')

@section("content")
    <div class="titulos">Editar perfil</div>

    <form action="?p=editarPerfil" method="POST" enctype="multipart/form-data">
        <div class="registracion inputEditarPerfil">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="" placeholder="Nombre">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" value="" placeholder="Nombre">
                    <div class="invalid-feedback">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <div class="input-class">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <div class="input-class">
                    <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-8">
                    <label for="provincia">Provincia</label>
                    <select id="provincia" name="provincia" class="form-control">
                            <option value="">CABA</option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="codigoPostal">C.P.</label>
                    <div class="input-class">
                        <input type="text" name="codigoPostal" placeholder="Codigo Postal" class="form-control" value="" id="codigoPostal">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="avatar">Imagen de usuario</label>
                <input type="file" value="Cambiar imagen" class="form-control-file" name="avatar">
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-group">
                <label for="generos">Generos favoritos</label>
                <select multiple name="generos[]" class="form-control" id="generos">
                        <option>Rock</option>
                </select>
            </div>
            <div class="boton-registo">
                <button type="submit" class="btn btn-verde">Guardar cambios</button>
            </div>
        </div>
    </form>
    @endsection