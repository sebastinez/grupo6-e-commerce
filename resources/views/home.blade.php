@extends('index')
@section("content")
@include("partials.cover")

<div class="preload center" id="circulo" style="padding-top:250px" >
	<div class="preloader-wrapper active ">
		<div class="spinner-layer big spinner-green-only">
			<div class="circle-clipper left">
			<div class="circle"></div>
			</div><div class="gap-patch">
			<div class="circle"></div>
			</div><div class="circle-clipper right">
			<div class="circle"></div>
			</div>
		</div>
	</div>
</div>

<div class="hide" id="connteniddo">
	<div class="container container-generos mt-5 animated fadeIn ">
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


@endsection