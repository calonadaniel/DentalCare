<nav class="navbar navbar-expand-lg navbar-dark text-white" >
    <a class="navbar-brand" href={{route('expediente.index')}}></a>
    <div>
      <i class="fas fa-tooth fa-1x "> Dra. Eunice Pinto </i>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active" style="">
          <a class="nav-link" href={{route('expediente.index')}}>Expediente<span class="sr-only"></span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('resumenclinico.index')}}">Resumen Clínico</a>
          </li>

        <li class="nav-item active">
        <a class="nav-link" href="{{route('pagos.index')}}">Pagos</a>
        </li>
        <li class="nav-item dropdown">
          <a  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{--Auth::user()->name  <span class="caret"></span>--}}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Cerrar Sesion') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
      </ul>
    </div>
</nav>