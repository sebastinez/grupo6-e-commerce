<div class="container">
    <div class="bread">
        <?php if ($p != "home") : ?>
            <i class="fas fa-home fa-2x"></i> <span id="breadcrumb-home"><a href="index.php">Home</a> </span>
            <span id="breadcrumb-barra"> / </span><span id="breadcrumb-page"><?= ucwords($p); ?></span>
        <?php endif; ?>
    </div>
</div>