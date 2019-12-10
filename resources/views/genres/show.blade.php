@extends("index")

@section("content")

<div class="container padding">
	{{ Breadcrumbs::render('genre',$genre) }}

	<div class="titulos">{{$genre->name}}</div>
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
		@unless(count($genre->album) > 0)
		<div class="no-disc">
			<p>No tenemos discos asociados a este género &#128531;</p>
		</div>
		@endunless

	</div>
</div>
    <div class="container center ">
        <div class="paginado">
            {{$albums->links()}}
        </div>
    </div>
<script src="{{asset("/js/comprarDisco.js")}}"></script>

@endsection
