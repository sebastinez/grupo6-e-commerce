<?php
include("./includes/breadcrumb.php");
include("./funciones/leerSpotify.php");
$albumes = getSpotify($_GET["g"]);
?>


<div class="container pt-5">
	<div class="container-albums">
		<?php foreach ($albumes as $album) : ?>
			<div class="contenedor-card-album animated fadeIn faster">
				<a href="?p=album&id=<?= $album["general"]["id"] ?>">
					<div class="card-img">
						<img src="<?= $album["general"]["imagen"] ?>">
					</div>
					<div class="info">
						<a href="#" class="name_artist"><?= $album["artista"]["nombre"] ?></a>
						<p class="name_disc"><?= $album["general"]["nombre"] ?></p>
						<div class="info-precio">
							<p class="anio">Lanzamiento <?php echo date_format(date_create($album["general"]["estreno"]), "Y"); ?></p>
							<span class="precio"><?= $album["general"]["precio"] ?> ARS</span>
							<span class="btn btn-naranja">comprar</span>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>