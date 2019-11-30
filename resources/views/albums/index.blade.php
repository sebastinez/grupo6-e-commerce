@extends("index")

@section("content")
<div class="container pt-5">
	<div class="container-albums">
    @foreach ($albums as $album)
    
			<div class="contenedor-card-album animated fadeIn faster">
				<a href="/albums/{{$album->id}}">
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
 				@if($album->stock > 0)
                <button style="display:block" data-type="comprar" data-id="{{$album->id}}" class="btn btn-naranja">comprar</button>
                @else
                <button class="btn btn-secondary" disabled>SIN STOCK</button>
                @endif
				</div>
    @endforeach
	</div>
</div>

@endsection