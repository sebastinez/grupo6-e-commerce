<?php
require("./funciones/leerSpotify.php");
$albumes = getSpotify("Classic", "EDM", "Funk", "Hip-Hop", "Jazz", "Latin", "Pop", "Reggae", "Rock", "Soundtrack");
if (isset($_SESSION["usuario"]["discos"])) {
    $discosComprados = searchMultipleAlbums($albumes, $_SESSION["usuario"]["discos"]);
}
if (isset($_SESSION["usuario"]["uid"])) {

    if (file_exists("img/" . $_SESSION["usuario"]["uid"] . "." . $_SESSION["usuario"]["fotoExtension"])) {
        $avatar = "img/" . $_SESSION["usuario"]["uid"] . "." . $_SESSION["usuario"]["fotoExtension"];
    } else {
        $avatar = "img/avatar.png";
    }
}
include("./includes/breadcrumb.php"); ?>
<div class="perfil container">
    <img src="<?= $avatar ?>" class="avatar">
    <h2><?= $_SESSION["usuario"]["nombre"] ?></h2>
    <?php if (isset($_SESSION["usuario"]["generos"])) { ?>

        <h4>Generos preferidos</h4>
        <div class="row">
            <?php for ($i = 0; $i < count($_SESSION["usuario"]["generos"]); $i++) : ?>
                <a href="?p=albums&g=<?= $_SESSION["usuario"]["generos"][$i] ?>">
                    <div class=" card-style">
                        <img src="img/generos/<?= strtolower($_SESSION["usuario"]["generos"][$i]) ?>.jpg" alt="">
                        <p><?= $_SESSION["usuario"]["generos"][$i] ?></p>
                    </div>
                </a>
            <?php endfor; ?>
        </div>
    <?php }
    if (isset($_SESSION["usuario"]["discos"])) { ?>
        <h4>Discos comprados</h4>
        <div class="row">
            <?php foreach ($discosComprados as $album) { ?>
                <div class="cuadro col-lg-3 col-md-6 col-xs-12">
                    <a href="?p=album&id=<?= $album["general"]["id"] ?>&g=<?= $album["genero"] ?>"><img src="<?= $album["general"]["imagen"] ?>"></a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>