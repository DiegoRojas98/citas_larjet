<ul class="nav nav-tabs justify-content-center" id="barranav">
    <li class="nav-item">
      <a class="nav-link disabled" aria-current="page" id="mensaje">Bienvenido {{session('name')}}  </a>
      </li>
    <li class="nav-item">
      <a class="nav-link @routeIs('usuarios.show') active @endif" aria-current="page" href="{{route('usuarios.show')}}">Mis datos </a>
    </li>
    @if (session('rol') == 1)
      <li class="nav-item">
        <a class="nav-link @routeIs('usuarios.store') active @endif" href="{{route('usuarios.store')}}">Usuarios</a>
      </li>
    @endif
    <li class="nav-item">
      <a class="nav-link 
        @routeIs('citas.store') active @endif
        @routeIs('citas.storeAdm') active @endif
        @routeIs('citas.create') active @endif"
        @if (session('rol') == 1)
          href="{{route('citas.storeAdm')}}"  
        @else
          href="{{route('citas.store')}}"
        @endif
      >Citas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('finish')}}" tabindex="-1" aria-disabled="true">Cerrar Sesion</a>
    </li>
</ul>