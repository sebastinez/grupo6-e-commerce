<?php

session_start();


if (isset($_GET["p"])) {
    $p = $_GET["p"];
    if ($p == "editarPerfil") {
        isLogged();
    }
} else {
    $p = "home";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Ubuntu:400,400i,500,500i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/animated.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>E-Commerce</title>
</head>

<body>
    <div class="container-fluid">
    @section("nav")
    <?php

if (isset($_SESSION["usuario"]["uid"])) {

  if (existeAvatar($_SESSION["usuario"])) {
    $avatar = "img/" . $_SESSION["usuario"]["uid"] . "." . $_SESSION["usuario"]["fotoExtension"];
  } else {
    $avatar = "img/avatar.png";
  }
}
?>

<nav id="menu" class="header-initial">
  <div class="menu-brand">
    <a href="/"><img src="/img/logo-g8.png" alt=""></a>
  </div>
  <div class="contenedor-buscador">
    <form action="paginas/auth.php" method="POST">
      <div class="input-group redimension-buscador">
        <input type="text" class="form-control" placeholder="Buscas un disco" name="query" aria-label="Buscar Disco" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-verde" type="submit" id="button-addon2">Buscar</button>
        </div>
      </div>
    </form>
  </div>
  <div class="menu-items">
    <?php if (isset($_SESSION["usuario"]["uid"])) { ?>
      <div class="menu-item">
        <span>Hola <?= explode(" ", $_SESSION["usuario"]["nombre"])[0] ?></span>
        <img src="<?= $avatar ?>" data-toggle="dropdown" class="userAvatar">
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="?p=perfilUsuario">Perfil publico</a>
          <a class="dropdown-item" href="?p=editarPerfil">Editar perfil</a>
          <a class="dropdown-item" href="logout.php">Cerrar sesion</a>
        </div>
      </div>
    <?php } else { ?>
      <div class="menu-item">
        <span><a href="/login">Login</a> | <a href="/register">Registrar</a></span>
      </div>
    <?php } ?>
    <div class="menu-item"><a href="/carrito"><i class="fas fa-shopping-cart"></a></i></div>
  </div>
</nav>
@show

        @section("header")
        <header class="home">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active bounceInRight">
                        <p>Discover</p>
                    </div>
                    <div class="carousel-item bounceInRight">
                        <p>Buy</p>
                    </div>
                    <div class="carousel-item bounceInRight">
                        <p>Listen</p>
                    </div>
                </div>
            </div>
        </header>
        @show

        @section("nav-productos")
      <nav id="productos">
  <!-- MOBILE -->
  <!-- //////////////////////////////// -->
  <button class="navbar-toggler bars-productos" type="button" data-toggle="collapse" data-target="#criterios"
    aria-controls="criterios" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>

  <div class="contenedor-buscador">
    <form action="paginas/auth.php" method="POST">
      <div class="input-group redimension-buscador">
        <input type="text" name="query" class="form-control" placeholder="Buscas un disco" aria-label="Buscar Disco"
          aria-describedby="button-addon2" />
        <div class="input-group-append">
          <button class="btn btn-outline-naranja" type="submit" id="button-addon2">
            Buscar
          </button>
        </div>
    </form>
  </div>
  </div>
  <div class="collapse navbar-collapse" id="criterios">
    <form action="paginas/auth.php" method="POST">
      <div id="criterios-div">
        <h3>Formato</h3>
        <div class="nav-producto-item">
          <input type="checkbox" name="formato" id="vinilo" value="vinilo" />
          <label for="vinilo">Vinilo</label>
        </div>
        <div class="nav-producto-item">
          <input type="checkbox" name="formato" id="cd" value="cd" />

          <label for="cd">Compact Disc</label>
        </div>
        <div class="nav-producto-item">
          <input type="checkbox" name="formato" id="cassette" value="cassette" />
          <label for="cassette">Cassette</label>
        </div>
        <h3>Genero</h3>

        <div class="nav-producto-item">
          <input type="checkbox" name="genre" value="rock" />
          <label for="rock">Rock</label>
        </div>
        <div class="nav-producto-item">
          <input type="checkbox" name="genre" value="pop" />

          <label for="pop">Pop</label>
        </div>
        <div class="nav-producto-item">
          <input type="checkbox" name="genre" value="classic" />
          <label for="classic">Clasica</label>
        </div>
        <h3>Decada</h3>

        <div class="nav-producto-item">
          <input type="checkbox" name="decada" value="2010" />
          <label for="2010">2010</label>
        </div>
        <div class="nav-producto-item">
          <input type="checkbox" name="decada" value="2000" />

          <label for="2000">2000</label>
        </div>
        <div class="nav-producto-item">
          <input type="checkbox" name="decada" value="1990" />
          <label for="1990">1990</label>
        </div>
      </div>
      <button type="submit" class="btn btn-naranja">Aplicar</button>
    </form>
  </div>

  <!-- //////////////////////////////// -->
  <!-- DESKTOP -->
  <!-- //////////////////////////////// -->

  <form action="paginas/auth.php" method="POST">
    <div class="container">
      <div class="row">
        <div class="col-4 nav-productos-item">
          <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Formato
            </button>
            <div class="dropdown-menu px-4 py-3">
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="vinilo" name="formato" value="vinilo" />
                  <label class="form-check-label">
                    Vinilo
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="cd" value="cd" name="formato" />
                  <label class="form-check-label">
                    Compact Disc
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="cassette" name="formato" value="cassette" />
                  <label class="form-check-label">
                    Cassette
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-naranja">Aplicar</button>
            </div>
          </div>
        </div>
        <div class="col-4 nav-productos-item">
          <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Generos
            </button>
            <div class="dropdown-menu px-4 py-3" aria-labelledby="dropdownMenuButton">
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rock" name="genero" value="rock" />
                  <label class="form-check-label">
                    Rock
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="pop" name="genero" value="pop" />
                  <label class="form-check-label">
                    Pop
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="clasica" name="genero" value="clasica" />
                  <label class="form-check-label">
                    Clasica
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-naranja">Aplicar</button>
            </div>
          </div>
        </div>
        <div class="col-4 nav-productos-item">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Decada
            </button>
            <div class="dropdown-menu px-4 py-3" aria-labelledby="dropdownMenuButton">
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="2010" name="decada" value="2010" />
                  <label class="form-check-label">
                    2010
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="2000" name="decada" value="2000" />
                  <label class="form-check-label">
                    2000
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="1990" name="decada" value="1990" />
                  <label class="form-check-label">
                    1990
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-naranja">Aplicar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</nav>
@endsection
        <div id="body">

@yield("content")

        </div>
@section("footer")
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h2>
                            <a href="/"><img src="img/logo-g8.png" alt="" /></a>
                        </h2>
                    </div>
                    <div class="col-sm-2">
                        <h5>Inicio</h5>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/register">Registro</a></li>
                            <li><a href="/carrito">Carrito</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <h5>Nosotros</h5>
                        <ul>
                            <li>
                                <a href="https://github.com/sebastinez/grupo8-e-commerce" target="_blank">Integrantes</a>
                            </li>
                            <li><a href="/contact">Contactanos</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <h5>Soporte</h5>
                        <ul>
                            <li><a href="/faq">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <div class="social">
                            <a href="https://www.instagram.com/_digitalhouse/?hl=es-la" class="instagram transition"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/_digitalhouse?lang=es" class="twitter transition"><i class="fab fa-twitter"></i></a>
                            <a href="https://es-la.facebook.com/digitalhouse.edu/" class="facebook transition"><i class="fab fa-facebook"></i></a>
                        </div>
                        <a href="/contact" class="btn btn-default">Contactanos</a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>E-Commerce - Grupo 8, TN - Digital House</p>
            </div>
        </footer>
@show
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/header.js"></script>
    <script src="/js/nav-productos-dropdown.js"></script>
</body>

</html>