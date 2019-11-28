@extends("index")

@section("content")
<div class="container padding">
	{{ Breadcrumbs::render('artist',$artist) }}

	<div class="resultados">
		<p>Resultados para: {{$artist->name}}</p>
	</div>
	<div class="container-albums">
		@foreach ($albums as $album)

		<div class="contenedor-card-album animated fadeIn faster">

			<div class="card-img">
				<a href="/albums/{{$album->id}}">
					<img src="{{$album->cover}}">
				</a>
			</div>
			<div class="info">
				<p class="name_artist">{{$album->artist[0]->name}}</p>

				<p class="name_disc">
					<a href="/albums/{{$album->id}}">{{$album->name}}</a>
				</p>
				<div class="info-precio">
					<span class="">Total tracks {{$album->total_tracks}}</span>
					<p class="anio">Lanzamiento {{$album->release_date}}</p>
					<span class="precio">{{$album->precio}} ARS</span>
				</div>
			</div>
			@auth
			@if($album->stock > 0)
			<button data-id="{{$album->id}}" data-type="comprar" data-user="{{Auth::user()->id}}" class="btn btn-naranja comprar">comprar</button>
			@else
			<button class="btn btn-secondary comprar" disabled>SIN STOCK</button>
			@endif
			@endauth
		</div>
		@endforeach
	</div>
</div>

<div class="container pt-5 pb-5">
	{{ $albums->links() }}
</div>
<script src="{{asset("/js/comprarDisco.js")}}"></script>

@endsection