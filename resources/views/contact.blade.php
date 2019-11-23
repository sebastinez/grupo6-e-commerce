@extends("index")

@section("content")
    <div class="titulos">Formulario de contacto</div>
    <div class="contacto container">
        <div class="form-group">
            <form action="?p=contacto" method="POST" class="form">
                <div class="form-group">
                    <!-- <label for="name">Nombre</label> -->
                    <input name="name" type="text" class="form-control input " placeholder="Nombre" value="<?= $_POST["name"] ?? "" ?>" id="name" />
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="email">Email</label> -->
                    <input name="email" type="text" class="form-control input " value="<?= $_POST["email"] ?? "" ?>" id="email" placeholder="Email" />
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="comment">Mensaje</label> -->
                    <textarea name="message" rows="5" class="form-control input " value="" id="comment" placeholder="Mensaje"></textarea>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-lg btn-naranja">Enviar</button>
                </div>
        </div>
    </div>
@endsection
