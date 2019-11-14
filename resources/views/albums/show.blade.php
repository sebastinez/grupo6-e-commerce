@extends('index')

@section("content")
<div class="mt-5" style="color: #fff;">
	<div class="container">
		<div class="card mb-3">
			<div class="row">
				<div class="col-md-4">
					<img src="{{$album->cover}}" class="card-img" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title">{{$album->name}}</h5>
						<h5 class="card-title">{{$album->artists[0]->name}}</h5>
						<p class="card-text">Release: {{$album->release_date}}<br>
							Cantidad de canciones: {{$album->total_tracks}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" style="color: #fff;">
	<div class="container">
		<div class="col-12">
		
        @foreach ($album->tracks as $track)
            @if($track->preview_url !== null)
			<div class="container mt-5">
				
					<h5>{{$track->name}}</h5>
					<audio src="{{$track->preview_url}}" controls>
					</audio>
			</div>
			@endif
        @endforeach
		</div>
	</div>
</div>
@endsection