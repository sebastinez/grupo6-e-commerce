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

<div class="row">
	<div class="container">
		<div class="card-columns">
			<?php foreach ($albums as $album):?>
			  <div class="card info">
			    <img src="<?php echo "$album[img]";?>" class="card-img-top" alt="...">
			    <div class="card-body">
			      <h5 class="card-title"><?php echo "$album[artist]";?></h5>
			      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			      <span class="precio"><?php echo "$ ". "$album[precio]";?></span>
			      <span><span class="btn btn-naranja">comprar</span></span>
			    </div>
			  </div>
			<?php endforeach;?>
		</div>
	</div>
</div>