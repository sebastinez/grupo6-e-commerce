<?php include("./funciones/leerSpotify.php");
$albumes = getSpotify("Classic", "EDM", "Funk", "Hip-Hop", "Jazz", "Latin", "Pop", "Reggae", "Rock", "Soundtrack");
$discosComprados = searchMultipleAlbums($albumes, $usuario["discos"]);
include("./includes/breadcrumb.php"); ?>
<div class="perfil container">
    <img src="img/<?= $usuario["uid"] ?>.jpg" class="avatar">
    <h2><?= $usuario["nombre"] ?></h2>
    <h4>Genres preferidos</h4>
    <div class="row">
        <?php for ($i = 0; $i < count($usuario["generos"]); $i++) : ?>
            <a href="?p=albums&g=<?= $usuario["generos"][$i] ?>">
                <div class=" card-style">
                    <img src="img/generos/<?= strtolower($usuario["generos"][$i]) ?>.jpg" alt="">
                    <p><?= $usuario["generos"][$i] ?></p>
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