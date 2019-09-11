<div class="container">
    <div class="bread">
        <?php if ($p != "home") : ?>
            <i class="fas fa-home fa-2x"></i> <span id="breadcrumb-home"><a href="index.php">Home</a> </span>
            <?php if ($p == "album") { ?>
                <span id="breadcrumb-barra"> / </span><span id="breadcrumb-home"><a href="?p=albums&g=<?= $_GET["g"] ?>">Albums de <?= $_GET["g"] ?></a></span><span id="breadcrumb-barra"> / </span><span id="breadcrumb-page">Album</span>
            <?php } elseif ($p == "albums") { ?>
                <span id="breadcrumb-barra"> / </span><span id="breadcrumb-page">Albums de <?= $_GET["g"] ?></span>
            <?php } elseif ($p == "perfilUsuario") { ?>
                <span id="breadcrumb-barra"> / </span><span id="breadcrumb-page">Perfil de Alejandro Villafañe</span>
            <?php } else { ?>
                <span id="breadcrumb-barra"> / </span><span id="breadcrumb-page"><?= ucwords($p); ?></span>
            <?php } ?>
        <?php endif; ?>
    </div>
</div>