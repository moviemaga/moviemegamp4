<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark text-white">
        <a class="navbar-brand" href="{{url('/')}}">www.movie-mega-mp4.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
              <li class="nav-item active">
                  <a class="nav-link" href="{{url('/programindex')}}">Programas y juegos <span class="sr-only">(current)</span></a>
              </li>
              @if (!empty(Auth::user()->email))

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-expanded="true" >Lenguajes</a>
                          <ul class="dropdown-menu" aria-labelledby="dropdown02">
                              <li><a class="dropdown-item" href="{{url('/languages')}}">Listar Lenguajes</a></li>
                              <li><a class="dropdown-item" href="{{url('/languages/create')}}">Registrar Lenguaje</a></li>
                          </ul>
                      </li>
                     <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="true" >Categorias</a>
                          <ul class="dropdown-menu" aria-labelledby="dropdown01">
                              <li><a class="dropdown-item" href="{{url('/categories')}}">Lista categorías pelicula</a></li>
                              <li><a class="dropdown-item" href="{{url('/categorieps')}}">Lista categorías programa</a></li>
                              <li><a class="dropdown-item" href="{{url('/categories/create')}}">Registrar categoría pelicula</a></li>
                              <li><a class="dropdown-item" href="{{url('/categorieps/create')}}">Registrar categoría programa</a></li>
                          </ul>
                     </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-expanded="true" >Peliculas</a>
                          <ul class="dropdown-menu" aria-labelledby="dropdown03">
                              <li><a class="dropdown-item" href="{{url('/movies')}}">Lista peliculas</a></li>
                              <li><a class="dropdown-item" href="{{url('/movies/create')}}">Registrar pelicula</a></li>
                          </ul>
                      </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-expanded="true" >Programas</a>
                      <ul class="dropdown-menu" aria-labelledby="dropdown04">
                          <li><a class="dropdown-item" href="{{url('/programs')}}">Lista programa</a></li>
                          <li><a class="dropdown-item" href="{{url('/programs/create')}}">Registrar programas</a></li>
                      </ul>
                  </li>
              @endif
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>

              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest

          </ul>
        </div>
</nav>


