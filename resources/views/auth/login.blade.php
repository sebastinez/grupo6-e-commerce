@extends("index")
@section("content")
<div class="container padding">

    {{ Breadcrumbs::render('login') }}
    <div class="titulos">Login</div>
    <div class="login">
        <div class="header">
            <h2>¡Hola! Para seguir, <br>ingresá tu e-mail y contraseña</h2>
        </div>
        <form class="body" action="{{ route('login') }}" method="POST" id="loginForm">
            @csrf
            <div class="form-group">

                <input type="email" name="email" value="{{ old('email') }}" class="form-control usuario {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="e-mail" autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <input type="password" name="password" class="form-control usuario {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="contraseña">
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember" style="color:#000">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="btn btn-verde">Ingresar</button>
                @if (Route::has('password.request'))
                <p class="olvide"><a href="{{ route('password.request') }}">Olvide la contraseña</a></p>
                @endif
        </form>
    </div>
</div>
<script src="{{asset("/js/login.js")}}"></script>
@endsection
