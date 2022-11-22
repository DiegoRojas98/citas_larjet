<ul class="nav nav-tabs justify-content-center mt-3" id="barranav">
    @if (session('rol') != 1)
        <li class="nav-item">
            <a class="nav-link @routeIs('citas.store') active @endif" aria-current="page" href="{{route('citas.store')}}">Mis citas </a>
        </li>
    @endif

    @if (session('rol') == 3)
      <li class="nav-item">    
        <a class="nav-link @routeIs('citas.create') active @endif" aria-current="page" href="{{route('citas.create')}}">Agendar </a>
      </li>
    @endif

    @if (session('rol') == 1)
      <li class="nav-item">
        <a class="nav-link @routeIs('citas.storeAdm') active @endif" href="{{route('citas.storeAdm')}}">Administracion de Citas</a>
      </li>
    @endif
</ul>