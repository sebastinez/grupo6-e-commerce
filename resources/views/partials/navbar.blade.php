<nav id="menu" class="header-initial">
  <div class="menu-brand">
    <a href="/"><img src="/img/logo-g8.png" alt=""></a>
  </div>
  <div class="contenedor-buscador">
    <form action="/search" method="POST">
      {{csrf_field()}}
      <div class="input-group redimension-buscador">
        <input type="text" class="form-control" placeholder="Buscas un disco" name="query" aria-label="Buscar Disco" aria-describedby="button-addon2">
        <div class="input-group-append">
          <select class="" name="type" type="submit" id="" style="padding-left:5px">
          <option value="artist">Artist</option>
          <option value="genre">Genre</option>
          <option value="album">Album</option>
          </select>
        </div>
      </div>
    </form>
  </div>
  <div class="menu-items">
    @auth
    <div class="menu-item">
      <span>Hola {{Auth::user()->name}}</span>
      @if(Auth::user()->avatar == null)
      <img src="/img/avatar.png" data-toggle="dropdown" class="userAvatar">
      @else
      <img src="/storage/{{Auth::user()->avatar}}" data-toggle="dropdown" class="userAvatar">
      @endif
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/users/{{Auth::user()->id}}/edit">Editar perfil</a>
        <a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesion</a>
      </div>
    </div>
    @endauth
    @guest
    <div class="menu-item">
      <span><a href="/login">Login</a> | <a href="/register">Registrar</a></span>
    </div>
    @endguest
    <div class="menu-item"><a href="/carrito"><i class="fas fa-shopping-cart"></a></i></div>
  </div>
</nav>