<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        @forelse($albums as $album)
        <img src="{{$album->cover}}" width="100">
        <li>{{ $album->name }} / {{$album->release_date}} / {{$album->label}} / {{$album->total_tracks}}</li>
        @empty
        <p>No hay discos</p>
        @endforelse
    </ul>
</body>

</html>