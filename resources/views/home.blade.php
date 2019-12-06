@extends('index')
@section("content")
@include("partials.cover")

<div class="container container-generos mt-5">
	@foreach ($genres as $genre)
	<div class="container-cards">
		<a href="/genres/{{$genre->id}}">
			<div class="card-style">
				<img src="/img/generos/{{strtolower($genre->name)}}.jpg" alt="">
				<p>{{$genre->name}}</p>
			</div>
		</a>
	</div>
	@endforeach
</div>




<section class="mas-vendidos">
	<div class="container">
		<div class="titulos">
			<p>Más vendidos</p>
		</div>
	</div>
	<div class="container pt-5">
		<div class="container-albums">
			@foreach ($albums as $album)
			<div class="contenedor-card-album animated fadeIn faster">
				<a href="/albums/{{$album->id}}">
					<div class="card-img">
						<img src="{{$album->cover}}">
					</div>
					<div class="info">
						<a class="name_artist" href="/artists/{{$album->artist[0]->id}}">{{$album->artist[0]->name}}</a>
						<p class="name_disc">{{$album->name}}</p>
						<div class="info-precio">
							<p class="anio">Lanzamiento {{$album->release_date}}</p>
							<span class="precio">{{$album->precio}} ARS</span>

						</div>
					</div>
				</a>

				@if($album->stock > 0)
				<button data-id="{{$album->id}}" data-type="comprar" class="btn btn-naranja comprar">comprar</button>
				@else
				<button class="btn btn-secondary comprar" disabled>SIN STOCK</button>
				@endif
			</div>
			@endforeach

		</div>
	</div>
</section>
<script src="{{asset("/js/comprarDisco.js")}}"></script>

<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalCenterTitle"> ¡Hola! Para seguir, <br>ingresá tu e-mail y contraseña
				</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="body" action="{{ route('login') }}" method="POST" id="loginForm">
				<div class="modal-body">
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
						@if (Route::has('password.request'))
						<p class="olvide"><a href="{{ route('password.request') }}">Olvide la contraseña</a></p>
						@endif
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-verde">Ingresar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalCenterTitle">REGISTRACIÓN
				</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('register') }}" method="POST">
				@csrf
				<div class="registracion">
					<div class="form-group">
						<div class="input-class">
							<input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nombre">
							@if ($errors->has('name'))
							<div class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
							</div>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="input-class">
							<input type="text" name="surname" value="{{ old('surname') }}" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" placeholder="Apellido">
							@if ($errors->has('surname'))
							<div class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('surname') }}</strong>
							</div>
							@endif
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
					<div class="form-group">
						<div class="input-class">
							<input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Contraseña">
							@if ($errors->has('password'))
							<div class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</div>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="input-class">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-verde">Ingresar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection