<nav class="navbar navbar-expand-lg nabvar-custom">
  <a class="navbar-brand" href="/">Bytestore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Formulario de búsqueda -->
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <!-- Fin Formulario de búsqueda -->
    <ul class="navbar-nav ml-auto">
      <!--<li class="nav-item active">
        <a class="nav-link" href="#">Autenticación <span class="sr-only">(current)</span></a>
      </li> -->

      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
      <li class="nav-item">
        <a class="nav-link" href="/showCart">@if(session()->get('cart')) {{session()->get('cart')->iTotalItems}}@endif<img src="{{ asset('ico/carritocompra.ico') }}" width=30/></a>
      </li>
      <li class="nav-item dropdown">
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Autenticacion</a>
          <a class="dropdown-item" href="/showCart"><img src="{{ asset('ico/carritocompra.ico') }}" width=30/></a>
        </div>
      </li>
    </ul>
  </div>
</nav>