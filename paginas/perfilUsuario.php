<?php include("./script/leerSpotify.php");
$albumes = array_slice(getSpotify("./data/Rock.json"), 0, 3);
include("./includes/breadcrumb.php"); ?>
<div class="perfil container">
    <img src="img/avatar.png" class="avatar">
    <h2>Alejandro Villafañe</h2>
    <h4>Genres preferidos</h4>
    <div class="row">
        <a href="?p=albums&g=Rock">
            <div class="card-style">
                <img src="img/generos/rock.jpg" alt="">
                <p>Rock</p>
            </div>
        </a>
        <a href="?p=albums&g=Pop">

            <div class="card-style">
                <img src="img/generos/pop.jpg" alt="">
                <p>Pop</p>
            </div>
        </a>
        <a href="?p=albums&g=Funk">
            <div class="card-style">
                <img src="img/generos/funk.jpg" alt="">
                <p>Country</p>
            </div>
        </a>
        <a href="?p=albums&g=Reggae">

            <div class="card-style">
                <img src="img/generos/reggae.jpg" alt="">
                <p>Reggea</p>
            </div>
        </a>
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