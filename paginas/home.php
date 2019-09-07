<?php include("./includes/breadcrumb.php"); ?>

<?php

$generos = [
			["genero" => "Country", "img_genero" => "img/generos/country.jpg"],
			["genero" => "Disco", "img_genero" => "img/generos/disco.jpg"],
			["genero" => "Folk", "img_genero" => "img/generos/folk.jpg"],
			["genero" => "Hip-Hop", "img_genero" => "img/generos/hip-hop.jpg"],
			["genero" => "Latino", "img_genero" => "img/generos/latino.jpg"],
			["genero" => "Pop", "img_genero" => "img/generos/pop.jpg"],
			["genero" => "Reggae", "img_genero" => "img/generos/reggae.jpg"],
			["genero" => "Rock", "img_genero" => "img/generos/rock.jpg"],
			["genero" => "House", "img_genero" => "img/generos/house.jpg"],
			["genero" => "Soul", "img_genero" => "img/generos/soul.jpg"],
			["genero" => "Techno", "img_genero" => "img/generos/techno.jpg"],
			["genero" => "jazz", "img_genero" => "img/generos/jazz.jpg"],
			["genero" => "Metal", "img_genero" => "img/generos/metal.jpg"],
			["genero" => "Blues", "img_genero" => "img/generos/blues.jpg"],
		];
?>


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


