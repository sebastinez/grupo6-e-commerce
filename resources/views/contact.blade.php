@extends("index")

@section("content")
<div class="contacto container padding">
    {{ Breadcrumbs::render('contacto') }}

    <div class="titulos">Formulario de contacto</div>
    <div class="form-group">
        <form action="/contact/send" method="POST" class="form">
            <div class="form-group">
                <!-- <label for="name">Nombre</label> -->
                <input name="name" type="text" class="form-control input {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre" value="{{ old('name') }}" id="name" />
                @if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
            </div>
            <div class="form-group">
                <!-- <label for="email">Email</label> -->
                <input name="mail" type="email" class="form-control input {{ $errors->has('mail') ? ' is-invalid' : '' }}" value="{{ old('mail') }}" id="mail" placeholder="Email" />
                @if ($errors->has('mail'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('mail') }}</strong>
						</span>
						@endif
            </div>
            <div class="form-group">
                <!-- <label for="comment">Mensaje</label> -->
                <textarea name="message" rows="5" class="form-control input {{ $errors->has('message') ? ' is-invalid' : '' }}" value="" id="comment" placeholder="Mensaje"></textarea>
                @if ($errors->has('message'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('message') }}</strong>
						</span>
						@endif
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-lg btn-naranja">Enviar</button>
            </div>
    </div>
</div>
@endsection