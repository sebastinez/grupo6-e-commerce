<?php require("./funciones/leerSpotify.php");
$albumes = getSpotify("Classic", "EDM", "Funk", "Hip-Hop", "Jazz", "Latin", "Pop", "Reggae", "Rock", "Soundtrack");
$discosComprados = searchMultipleAlbums($albumes, $_SESSION["usuario"]["discos"]);
include("./includes/breadcrumb.php"); ?>
<div class="perfil container">
    <img src="img/<?= $_SESSION["usuario"]["uid"] ?>.jpg" class="avatar">
    <h2><?= $_SESSION["usuario"]["nombre"] ?></h2>
    <h4>Genres preferidos</h4>
    <div class="row">
        <?php for ($i = 0; $i < count($_SESSION["usuario"]["generos"]); $i++) : ?>
            <a href="?p=albums&g=<?= $_SESSION["usuario"]["generos"][$i] ?>">
                <div class=" card-style">
                    <img src="img/generos/<?= strtolower($_SESSION["usuario"]["generos"][$i]) ?>.jpg" alt="">
                    <p><?= $_SESSION["usuario"]["generos"][$i] ?></p>
                </div>
            </a>
        <? endfor; ?>
    </div>
    <h4>Discos comprados</h4>
    <div class="row">
        <?php foreach ($discosComprados as $album) { ?>
            <div class="cuadro col-lg-3 col-md-6 col-xs-12">
                <a href="?p=album&id=<?= $album["general"]["id"] ?>&g=<?= $album["genero"] ?>"><img src="<?= $album["general"]["imagen"] ?>"></a>
            </div>
        <?php } ?>
    </div>
</div>