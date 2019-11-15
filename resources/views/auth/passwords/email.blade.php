@extends('index')

@section('content')
<div class="titulos">Reset Password</div>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="registracion">

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="form-group">
            <div class="input-class">
                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="boton-registo">
            <button type="submit" class="btn btn-verde">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </div>
</form>
@endsection