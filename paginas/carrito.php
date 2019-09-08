<?php include("./includes/breadcrumb.php");
include("./script/leerSpotify.php");
$albumes = getSpotify("./data/pruebaspotify.json");
$album1 = searchAlbum($albumes, "1A2GTWGtFfWp7KSQTwWOyo");
$album2 = searchAlbum($albumes, "382ObEPsp2rxGrnsizN5TX");
?>
<div class="titulos">Carrito de compra</div>
<div class="container">
    <div class="carrito">
    <hr>
    <div class="row">
        <div class="col-lg-4 col-md-12"><img src="<?= $album1["general"]["imagen"] ?>"></div>
        <div class="col-lg-5 col-md-12">
            <h2><?= $album1["general"]["nombre"] ?></h2><span>2000,00 ARS</span>
            <p><?= $album1["artista"]["nombre"] ?></p>
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
        <div class="col-lg-3 col-md-12 precio precio-desktop">2000,00 ARS</div>

    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4 col-md-12"><img src="<?= $album2["general"]["imagen"] ?>"></div>
        <div class="col-lg-5 col-md-12">
            <h2><?= $album2["general"]["nombre"] ?></h2><span>2000,00 ARS</span>
            <p><?= $album2["artista"]["nombre"] ?></p>
            <p class="text-danger">Demora de 10 días</p>
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
        <div class="col-lg-3 col-md-12 precio-desktop precio">2000,00 ARS</div>

    </div>
</div>
</div>