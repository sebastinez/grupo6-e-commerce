@extends("index")

@section("content")


<div class="padding">
    <div class="titulos">REGISTRACIÓN</div>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="registracion">
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-class">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nombre">
                    @if ($errors->has('name'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-class">
                    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Apellido">
                    @if ($errors->has('surname'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-class">
                <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email">
                @if ($errors->has('email'))
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-class">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Contraseña">
                    @if ($errors->has('password'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="input-class">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña" required>
                </div>
            </div>
        </div>
        <div class="boton-registo">
            <button type="submit" class="btn btn-verde">Registrar</button>
        </div>
    </div>
</form>
</div>

@endsection