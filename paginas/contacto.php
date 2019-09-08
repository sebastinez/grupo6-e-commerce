<?php include("./includes/breadcrumb.php"); ?>
<div class="titulos">Formulario de contacto</div>
<div class="contacto container">
    <div class="form-group">
        <form class="form" id="">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input name="name" type="text" class="form-control input" required placeholder="Nombre" id="name" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" required class="form-control form-control input" id="email" placeholder="Email" />
            </div>
            <div class="form-group">
                <label for="comment">Mensaje</label>

                <textarea name="message" rows="5" class="form-control input" id="comment" placeholder="Mensaje"></textarea>
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-lg btn-naranja">Enviar</button>
            </div>
    </div>
</div>