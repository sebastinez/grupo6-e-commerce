@extends("index")

@section("content")

<div class="container padding">
	<div class="titulos">{{$genre->name}}</div>
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
						<span class="precio">{{$album->precio}} ARS</span>
					</div>
				</div>
			</a>
			@auth
			@if($album->stock > 0)
			<button data-id="{{$album->id}}" data-type="comprar" data-user="{{Auth::user()->id}}" class="btn btn-naranja comprar">comprar</button>
			@else
			<button class="btn btn-secondary comprar" disabled>SIN STOCK</button>
			@endif
			@endauth
		</div>
		@endforeach
		{{$albums->links()}}
		@unless(count($genre->album) > 0)
		<div class="titulos" style="font-size:2rem">No tenemos discos asociados a este genero</div>
		@endunless

	</div>
</div>
<script src="{{asset("/js/comprarDisco.js")}}"></script>

@endsection