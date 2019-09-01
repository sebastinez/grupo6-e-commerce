<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>E-Commerce</title>
</head>

<body>
    <div class="container">
        <?php
        include("./includes/nav.html");
        ?>

        <?php
        include("./includes/header.html");
        ?>

        <?php
        include("./includes/nav-productos.html");
        ?>

        <!-- Acá debe ir el contenido cambiante entre header y footer -->

        <?php
        include("./includes/footer.html");
        ?>
    </div>
</body>

</html>