<?php include("./includes/breadcrumb.php");
include("./funciones/leerSpotify.php");
$albumes = getSpotify("Rock");
$album1 = searchAlbum($albumes, "1RCAG3LrDwYsNU5ZiUJlWi");
$album2 = searchAlbum($albumes, "6P5QHz4XtxOmS5EuiGIPut");
?>
<div class="titulos">Carrito de compra</div>
<div class="container">
    <div class="carrito">
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-12"><img src="<?= $album1["general"]["imagen"] ?>"></div>
            <div class="col-lg-5 col-md-12">
                <h2><?= $album1["general"]["nombre"] ?></h2><span><?= $album1["general"]["precio"] ?> ARS</span>
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
            <div class="col-lg-3 col-md-12 precio precio-desktop"><?= $album1["general"]["precio"] ?> ARS</div>

        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-12"><img src="<?= $album2["general"]["imagen"] ?>"></div>
            <div class="col-lg-5 col-md-12">
                <h2><?= $album2["general"]["nombre"] ?></h2><span><?= $album2["general"]["precio"] ?> ARS</span>
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
            <div class="col-lg-3 col-md-12 precio-desktop precio"><?= $album2["general"]["precio"] ?> ARS</div>

        </div>
    </div>
</div>