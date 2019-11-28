@extends("index")

@section("content")
<div class="padding">
    <div class="container">
        <div class="titulos">Carrito de compra</div>
        <div class="carrito">
            @foreach ($albums as $album)
            <div class="row pb-3" data-disco="d{{$album->id}}">
                <div class="col-lg-4 col-md-12"><img src="{{$album->cover}}"></div>
                <div class="col-lg-5 col-md-12">
                    <h2>{{$album->name}}</h2><span>{{$album->precio}} ARS</span>
                    <p>{{$album->artist[0]->name}}</p>
                    @if($album->stock > 0)
                    <p class="text-success">En Stock (quedan {{$album->stock}} discos)</p>
                    @else
                    <p class="text-warning">No hay stock</p>
                    @endif
                    <div class="form-row">
                        <div class="col-3">
                            <input type="number" name="cantidad" class="form-control" value="{{$album->pivot->cantidad}}" data-disco="d{{$album->id}}">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-danger" data-stock="{{$album->stock}}" data-id="{{$album->id}}" data-user="{{Auth::user()->id}}" data-type="update">Actualizar</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-danger" data-id="{{$album->id}}" data-user="{{Auth::user()->id}}" data-type="borrar">Borrar</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 precio precio-desktop">{{$album->precio}} ARS</div>
            </div>
            @endforeach
        </div>
        {{$albums->links()}}
        @unless(count($albums) > 0)
        <div class="titulos" style="font-size:2rem">No hay discos en el carrito</div>
        @endunless
    </div>
</div>
<script src="{{asset("/js/comprarDisco.js")}}"></script>

@endsection