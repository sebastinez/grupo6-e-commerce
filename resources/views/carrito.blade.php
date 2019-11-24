@extends("index")

@section("content")
<div class="padding">
        <div class="container">
                <div class="titulos">Carrito de compra</div>
                    <div class="carrito">
                        <hr>
                        <div class="row">
                            <div class="col-lg-4 col-md-12"><img src="https://i.scdn.co/image/a70b5fec5600e974f58259c5639f6b20f517dd5f"></div>
                            <div class="col-lg-5 col-md-12">
                                <h2>Yellow Submarine</h2><span>300 ARS</span>
                                <p>The Beatles</p>
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
                    </div>
                </div>
</div>
@endsection