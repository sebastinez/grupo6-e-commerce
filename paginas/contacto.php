<?php include("./includes/breadcrumb.php"); ?>
<h1 class="titulo-body">Formulario de contacto</h1>
<div class="container">
    <div id="main-form">
        <div id="form-div">
            <form class="form" id="">
                <p class="name">
                    <input name="name" type="text" class="input" required placeholder="Name" id="name" />
                </p>
                <p class="email">
                    <input name="email" type="email" required class="input" id="email" placeholder="Email" />
                </p>
                <p class="text">
                    <textarea name="message" class="input" id="comment" placeholder="Message"></textarea>
                </p>
                <div class="submit">
                    <button type="submit" class="btn btn-default">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>