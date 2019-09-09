<?php
include("./includes/breadcrumb.php");
include("./data/generos.php");
include("script/leerSpotify.php");
$arrayDeAlbumes = array_slice(getSpotify("Classic", "EDM", "Funk", "Hip-Hop", "Jazz", "Latin", "Pop", "Reggae", "Rock", "Soundtrack"), 0, 10);
shuffle($arrayDeAlbumes);
?>

<div class="container container-generos mt-5">
	<?php foreach ($generos as $genero) : ?>
		<div class="container-cards">
			<a href="?p=albums&g=<?= $genero["genero"] ?>">
				<div class="card-style">
					<img src=" <?php echo "$genero[img_genero]"; ?> " alt="">
					<p><?php echo "$genero[genero]"; ?></p>
				</div>
			</a>
		</div>
	<?php endforeach; ?>
</div>

<hr>
<div class="container">
	<div class="titulos">
		<p>Más vendidos</p>
	</div>
</div>
<div class="container pt-5">
	<div class="container-albums">
		<?php foreach ($arrayDeAlbumes as $album) : ?>
			<div class="contenedor-card-album animated fadeIn faster">
				<a href="?p=album&id=<?= $album["general"]["id"] ?>">
					<div class="card-img">
						<img src="<?= $album["general"]["imagen"] ?>">
					</div>
					<div class="info">
						<a href="#" class="name_artist"><?= $album["artista"]["nombre"] ?></a>
						<p class="name_disc"><?= $album["general"]["artista"] ?></p>
						<p class="anio">Lanzamiento <?= $album["general"]["estreno"] ?></p>
						<span class="precio"><?= $album["general"]["precio"] ?> ARS</span>
						<span><span class="btn btn-naranja">comprar</span></span>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>