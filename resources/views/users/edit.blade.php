@extends('index')

@section("content")
<div class="container padding">
    {{ Breadcrumbs::render('editPerfil') }}

    <div class="titulos">Editar perfil</div>

    <form action="/users" method="POST" enctype="multipart/form-data">
        @method("patch")
        {{csrf_field()}}
        <div class="registracion inputEditarPerfil">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" placeholder="Nombre">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="surname">Apellido</label>
                    <input type="text" name="surname" class="form-control" id="surname" value="{{$user->surname}}" placeholder="Apellido">
                    <div class="invalid-feedback">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <div class="input-class">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="avatar">Imagen de usuario</label>
                <input type="file" value="Cambiar imagen" class="form-control-file" name="avatar">
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="boton-registo">
                <button type="submit" class="btn btn-verde">Guardar cambios</button>
            </div>
        </div>
    </form>
</div>
@endsection