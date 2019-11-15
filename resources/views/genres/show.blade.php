@extends("index")

@section("content")
<div class="container pt-5">
	<div class="container-albums">
		@foreach ($genre as $album)

		<div class="contenedor-card-album animated fadeIn faster">
			<a href="/album/{{$album->id}}">
				<div class="card-img">
					<img src="{{$album->cover}}">
				</div>
				<div class="info">
					{{$album->artist[0]->name}}
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
		{{$genre->links()}}
		@unless(count($genre) > 0)
		<h2 style="color:#fff">No tenemos discos asociados a este genero</h2>
		@endunless
	</div>
</div>

@endsection