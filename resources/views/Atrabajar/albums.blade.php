@extends("index")

@section("content")
<div class="container pt-5">
	<div class="container-albums">
			<div class="contenedor-card-album animated fadeIn faster">
				<a href="/album/6J17MkMmuzBiIOjRH6MOBZ&g=Rock">
					<div class="card-img">
						<img src="https://i.scdn.co/image/a70b5fec5600e974f58259c5639f6b20f517dd5f">
					</div>
					<div class="info">
					The Beatles
						<p class="name_disc">Yellow Submarine</p>
						<div class="info-precio">
							<p class="anio">Lanzamiento 1990</p>
							<span class="precio">300 ARS</span>
						</div>
					</div>
				</a>
				<button class="btn btn-naranja comprar">comprar</button>
			</div>
	</div>
</div>

@endsection