@extends('index')

@section("nav")
@section("header")
@endsection

@section("content")
<div class="perfil container">
    <img src="" class="avatar">
    <h2>John Doe</h2>
        <h4>Generos preferidos</h4>
        <div class="row">
                <a href="/albums/Rock">
                    <div class=" card-style">
                        <img src="/img/generos/Rock.jpg" alt="">
                        <p>Rock</p>
                    </div>
                </a>
        </div>
        <h4>Discos comprados</h4>
        <div class="row">
                <div class="cuadro col-lg-3 col-md-6 col-xs-12">
                    <a href="/album/6J17MkMmuzBiIOjRH6MOBZ"><img src="https://i.scdn.co/image/a70b5fec5600e974f58259c5639f6b20f517dd5f"></a>
                </div>
        </div>
</div>

@endsection