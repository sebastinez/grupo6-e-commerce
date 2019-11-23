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
						<h5 class="card-title">{{$album->artist[0]->name}}</h5>
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

			@foreach ($album->track as $track)
			<div class="container mt-5">
				@if($track->preview_url !== null)
				<h5>{{$track->track_number}} - {{$track->name}}</h5>
				<audio src="{{$track->preview_url}}" controls> </audio>
				@else
				<h5><a href={{'https://open.spotify.com/track/'.$track["spotify_id"]}}>{{$track->track_number}} - {{$track->name}}</a></h5>
				@endif
			</div>
			@endforeach

		</div>
	</div>
</div>

{{ $albums->links() }}
@endsection