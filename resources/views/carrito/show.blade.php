@extends("index")

@section("content")
<div class="titulos">Carrito de compra de {{$cart->user->name}}</div>
<div class="container">
    <div class="carrito">
        @foreach ($cart->album as $album)
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-12"><img src="{{$album->cover}}"></div>
            <div class="col-lg-5 col-md-12">
                <h2>{{$album->name}}</h2><span>300 ARS</span>
                <p>{{$album->artist[0]->name}}</p>
                <p class="text-success">En Stock</p>
                <select name="cantidad" id="" class="form-control">
                    <option value="">Cantidad...</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5+</option>
                </select>
                <button class="btn btn-danger">Borrar</button>
            </div>
            <div class="col-lg-3 col-md-12 precio precio-desktop">300 ARS</div>

        </div>
        @endforeach
    </div>
</div>
@endsection