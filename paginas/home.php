<?php
	include("./includes/breadcrumb.php");
	require("./data/generos.php");
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


