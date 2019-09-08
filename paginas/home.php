<?php
	include("./includes/breadcrumb.php");
	include("./data/generos.php");
	include("script/leerSpotify.php");
	$arrayDeAlbumes = getSpotify("./data/pruebaspotify.json");

; ?>




<div class="container container-generos mt-5">
	<?php foreach ($generos as $genero) :?>
		<div class="container-cards">
			<a href="?p=albums">
				<div class="card-style">
					<img src=" <?php echo "$genero[img_genero]";?> " alt="">
				<p><?php echo "$genero[genero]";?></p>
				</div>
			</a>
		</div>
	<?php endforeach;?>
</div>


<hr>

<div class="container pt-5">
	<div class="container-albums">
		<?php foreach ($arrayDeAlbumes as $album):?>
			<div class="contenedor-card-album animated fadeIn faster">
				<a href="?p=album">
					<div class="card-img">
						<img src="<?php echo $album["general"]["imagen"]; ?>">
					</div>
					<div class="info">
						<a href="#" class="name_artist"><?php echo $album["artista"]["nombre"]; ?></a>
						<p class="name_disc"><?php echo $album["general"]["artista"];?></p>
						<p class="anio"><?php echo $album["general"]["estreno"];?></p>
						<span class="precio"><?php echo $album["general"]["tracks"];?></span>
						<span><span class="btn btn-naranja">comprar</span></span>
					</div>
				</a>
			</div>
		<?php endforeach;?>
	</div>
</div>
<!-- 
return [
        "id" => $array["id"],
        "imagen" => $array["images"][1]["url"],
        "imagenSize" => $array["images"][1]["width"],
        "nombre" => $array["name"],
        "estreno" => $array["release_date"],
        "tracks" => $array["total_tracks"]
    ];
 -->



