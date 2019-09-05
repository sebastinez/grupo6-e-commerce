<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Ubuntu:400,400i,500,500i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="css/animated.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>E-Commerce</title>
</head>

<body>
    <?php


    if ($_POST) {

        echo "<h1>Aqui los datos del formulario de login</h1>";

        var_dump($_POST);
    } else {
        echo "<h1>No se recibio formulario de login</h1>";
    }

    echo "<h3><a href='../index.php'>Volver a pagina inicial</a></h3>";

    ?>
</body>

</html>