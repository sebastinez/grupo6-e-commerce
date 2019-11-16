<nav id="menu" class="header-initial">
  <div class="menu-brand">
    <a href="/"><img src="/img/logo-g8.png" alt=""></a>
  </div>
  <div class="contenedor-buscador">
    <form action="/search">
      <div class="input-group redimension-buscador">
        <input type="text" class="form-control" name="query" list="result"
          id="search" autocomplete="off">
        <datalist id="result"></datalist>
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
      <div class="dropdown-menu dropdown-menu-right"
        aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/users/{{Auth::user()->id}}/edit">Editar
          perfil</a>
        <a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesion</a>
      </div>
    </div>
    @endauth
    @guest
    <div class="menu-item">
      <span><a href="/login">Login</a> | <a
          href="/register">Registrar</a></span>
    </div>
    @endguest
    <div class="menu-item"><a href="/carrito"><i
          class="fas fa-shopping-cart"></a></i></div>
  </div>
</nav>
<script>var searchField = document.getElementById("search");
  searchField.addEventListener("keypress", busquedaCambio);
  var datalist = document.getElementById("result");
  function busquedaCambio(event) {
    fetch("/search?query=" + event.target.value, {
      method: "GET"
    }).then(response => response.json()).then(json => {
      datalist.innerHTML = ""
      json.albums.forEach(element => {
        var option = document.createElement("option");
        option.text = element.name + " - " + "Albums";
        datalist.appendChild(option);
      })
      json.artists.forEach(element => {
        var option = document.createElement("option");
        option.text = element.name + " - " + "Artists";
        datalist.appendChild(option);
      })
      json.genre.forEach(element => {
        var option = document.createElement("option");
        option.text = element.name + " - " + "Genres";
        datalist.appendChild(option);
      })
    })
  }
  function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }
</script>