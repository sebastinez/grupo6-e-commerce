@extends("index")

@section("content")

<div class="container padding">
<div class="titulos">{{$genre->name}}</div>
	<div class="container-albums">
		@foreach ($albums as $album)

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
		{{$albums->links()}}
		@unless(count($genre->album) > 0)
		<div class="titulos" style="font-size:2rem">No tenemos discos asociados a este genero</div>
		@endunless

	</div>
</div>

@endsection
