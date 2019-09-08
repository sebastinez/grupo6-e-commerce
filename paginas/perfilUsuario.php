<?php include("./script/leerSpotify.php");
$albumes = getSpotify("./data/pruebaspotify.json");
include("./includes/breadcrumb.php"); ?>
<div class="perfil container">
    <img src="img/avatar.png" class="avatar">
    <h2>Alejandro Villafañe</h2>
    <h4>Genres preferidos</h4>
    <div class="row">
        <div class="card-style">
            <img src="img/generos/rock.jpg" alt="">
            <p>Rock</p>
        </div>
        <div class="card-style">
            <img src="img/generos/pop.jpg" alt="">
            <p>Pop</p>
        </div>
        <div class="card-style">
            <img src="img/generos/country.jpg" alt="">
            <p>Country</p>
        </div>
        <div class="card-style">
            <img src="img/generos/reggae.jpg" alt="">
            <p>Reggea</p>
        </div>
    </div>
    <h4>Discos comprados</h4>
    <div class="row">
        <?php foreach ($albumes as $album) { ?>
            <div class="cuadro col-lg-3 col-md-6 col-xs-12">
                <a href="?p=album&id=<?= $album["general"]["id"] ?>"><img src="<?= $album["general"]["imagen"] ?>"></a>
            </div>
        <?php } ?>
    </div>
</div>