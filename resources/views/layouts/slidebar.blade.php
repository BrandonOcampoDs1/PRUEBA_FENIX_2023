@yield('slidebar')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 fondo_slidebar">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-2 pt-1 text-white min-vh-100">
                

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ url ( '/')}}" class="item_slide align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Menu</span>
                        </a>
                        <hr>
                    </li>
                    <li class="nav-item mt-3">
                        <a href="{{ url ( '/RegistrarUsuarios')}}" class="item_slide align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Registro de usuario</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a href="{{ url ( '/ControlUsuarios')}}" class="item_slide align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Control de usuarios</span>
                        </a>
                    </li>
                </ul>
                <hr>

                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">{{ Auth::user()->nombre_completo }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection