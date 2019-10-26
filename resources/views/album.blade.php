@extends('index')

@section("nav")
@section("header")
@endsection

@section("content")
<div class="mt-5" style="color: #fff;">
	<div class="container">
		<div class="card mb-3">
			<div class="row">
				<div class="col-md-4">
					<img src="https://i.scdn.co/image/a70b5fec5600e974f58259c5639f6b20f517dd5f" class="card-img" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title">Yellow Submarine</h5>
						<h5 class="card-title">The Beatles</h5>
						<p class="card-text">Release: 1990<br>
							Cantidad de canciones: 10</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" style="color: #fff;">
	<div class="container">
		<div class="col-12">
			<div class="container mt-5">
				
					<h5>Nombre de cancion</h5>
					<audio src="" controls>
					</audio>
			</div>
		</div>
	</div>
</div>
@endsection