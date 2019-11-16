@extends("index")

@section("content")
<div class="container pt-5">
	<div class="container-albums">
    @foreach($artist as $artistOne)
        <h1>{{$artistOne->name}}</h1>
        @endforeach
	</div>
</div>

@endsection