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

		</div>
	</div>
</section>
@endsection