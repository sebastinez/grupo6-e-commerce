<nav id="menu" class="header-initial">
  <div class="menu-brand">
    <a href="/"><img src="/img/logo-g8.png" alt=""></a>
  </div>
  <div class="contenedor-buscador">
    <form action="/">
      @csrf
      <div class="ui category search">
        <div class="ui icon input">
          <input class="prompt" id="search" name="query" type="text" placeholder="Search music...">
          <i class="search icon"></i>
        </div>
        <div class="results"></div>
      </div>
      {{-- <div class="input-group redimension-buscador">
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="type" name="type">
        <input type="text" class="form-control" name="query" list="result"
          id="search" autocomplete="off">
        <datalist name="result" id="result"></datalist>
      </div> --}}
    </form>
  </div>
  <div class="menu-items">
    @auth
    <div class="menu-item">
      <span>Hola {{Auth::user()->name}}</span>
      @if(Auth::user()->avatar == null)
      <img src="/img/avatar.png" data-toggle="dropdown" class="userAvatar">
      @else
      <img src="{{ Storage::url(Auth::user()->avatar) }}" data-toggle="dropdown" class="userAvatar">
      @endif
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/users/edit">Editar
          perfil</a>
        <a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesion</a>
      </div>
    </div>
    @endauth
    @guest
    <div class="menu-item">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Login/Registro</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/login">Login</a>              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/register">Registrar</a>
            </div>
          </li>
    </div>
    @endguest
    <div class="menu-item"><a href="/carrito">
        <i class="fas fa-shopping-cart"></a></i>
    </div>
  </div>
</nav>