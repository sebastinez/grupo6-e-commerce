<?php
include("./includes/breadcrumb.php");
include("./script/leerSpotify.php");
$albumes = getSpotify("./data/pruebaspotify.json");
$album = searchAlbum($albumes, $_GET["id"]);
?>


<div class="mt-5" style="color: #fff;">
	<div class="container">
		<div class="card mb-3">
			<div class="row">
				<div class="col-md-4">
					<img src="<?= $album["general"]["imagen"] ?>" class="card-img" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?= $album["general"]["nombre"] ?></h5>
						<h5 class="card-title"><?= $album["artista"]["nombre"] ?></h5>
						<p class="card-text">Release: <?php echo date_format(date_create($album["general"]["estreno"]), "d/m/Y"); ?><br>
							Cantidad de canciones: <?= $album["general"]["tracks"] ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" style="color: #fff;">
	<div class="container">
		<div class="col-12">
			<div class="container mt-5">
				<?php foreach ($album["canciones"] as $cancion) { ?>
					<h5><?= $cancion["nombre"] ?></h5>
					<audio src="<?= $cancion["preview"] ?>" controls>
					</audio>
				<?php } ?>
			</div>
		</div>
	</div>
</div>