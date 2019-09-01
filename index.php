<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Ubuntu:400,400i,500,500i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="css/animated.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>E-Commerce</title>
</head>

<body>
    <div class="container-fluid">
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