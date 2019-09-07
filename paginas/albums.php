<?php
	include("./includes/breadcrumb.php");
	include("data/albums.php");
?>


<div class="container pt-5">
	<div class="container-albums">
		<?php foreach ($albums as $album):?>
			<div class="contenedor-card-album animated fadeIn faster">
				<a href="?p=album">
					<div class="card-img">
						<img src="<?php echo "$album[img]";?>">
					</div>
					<div class="info">
						<a href="#" class="name_artist"><?php echo "$album[artist]";?></a>
						<p class="name_disc"><?php echo "$album[name_disc]";?></p>
						<p class="anio"><?php echo "Año ". "$album[anio]";?></p>
						<span class="precio"><?php echo "$ ". "$album[precio]";?></span>
						<span><span class="btn btn-naranja">comprar</span></span>
					</div>
				</a>
			</div>
		<?php endforeach;?>
	</div>
</div>

