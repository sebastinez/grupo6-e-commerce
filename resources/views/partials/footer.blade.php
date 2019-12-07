    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a href="/"><img src="/img/logo-g8.png" alt="the_music_company" /></a>
                </div>
                <div class="col-sm-3">
                    <h5>Inicio</h5>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/register">Registro</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Nosotros</h5>
                    <ul>
                        <li>
                            <a href="https://github.com/sebastinez/grupo8-e-commerce" target="_blank">Integrantes</a>
                        </li>
                        <li><a href="/contact">Contactanos</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Soporte</h5>
                    <ul>
                        <li><a href="/faq">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="social">
                    <a href="https://www.instagram.com/_digitalhouse/?hl=es-la" class="instagram transition"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/_digitalhouse?lang=es" class="twitter transition"><i class="fab fa-twitter"></i></a>
                    <a href="https://es-la.facebook.com/digitalhouse.edu/" class="facebook transition"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>E-Commerce - Grupo 8, TN - Digital House</p>
        </div>
    </footer>


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
						<button type="submit" id="loginButton" class="btn btn-verde">Ingresar</button>
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


    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/js/header.js"></script>
    <script src="/js/buscador.js"></script>
    <script src="/js/modal.js"></script>
    <script src="/js/login.js"></script>
	<script src="/js/nav-productos-dropdown.js"> </script>
	<script src="/js/preloader.js"> </script>
    </body>

    </html>