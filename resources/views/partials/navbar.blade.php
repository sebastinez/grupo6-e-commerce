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