@extends("index")

@section("content")

<div class="container">
<div class="titulos">{{$genre->name}}</div>
	<div class="container-albums">
		@foreach ($genre->album as $album)

		<div class="contenedor-card-album animated fadeIn faster">
			<a href="/album/{{$album->id}}">
				<div class="card-img">
					<img src="{{$album->cover}}">
				</div>
				<div class="info">
					<a class="name_artist" href="">{{$album->artist[0]->name}}</a>
					<p class="name_disc">{{$album->name}}</p>
					<div class="info-precio">
						<p class="anio">Lanzamiento {{$album->release_date}}</p>
						<span class="precio">300 ARS</span>
					</div>
				</div>
			</a>
			<button class="btn btn-naranja comprar">comprar</button>
		</div>
		@endforeach
		@unless(count($genre->album) > 0)
		<h2 style="color:#fff">No tenemos discos asociados a este genero</h2>
		@endunless
		
	</div>
</div>

@endsection