@extends('index')

@section("content")
    <div class="titulos">Editar perfil</div>

    <form action="/users/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
        @method("patch")
        {{csrf_field()}}
        <div class="registracion inputEditarPerfil">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="{{$user->name}}" placeholder="Nombre">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" value="{{$user->surname}}" placeholder="Nombre">
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
    @endsection