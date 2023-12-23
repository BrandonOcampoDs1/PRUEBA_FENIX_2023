@extends('layouts.app')

@section('content')
<div class="col py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">Bienvenido/a administrador {{ Auth::user()->nombre_completo }}</h5>
                            <p class="card-text">
                                Esta vista es unicamente para usted, solo usuarios con el rol de <b>{{ Auth::user()->tipo_usuario }}</b>
                                pueden ingresar. <br> Podrá <a href="{{ url ( '/RegistrarUsuarios')}}">registrar usuarios </a> y <a href="{{ url ( '/ControlUsuarios')}}">controlar los usuarios</a>  ya existentes.
                            </p>
                            <p class="card-text">
                                <h4 class="text-muted">Cantidad de usuarios: <span class="text-primary">{{$cantidadRegistros}}</span></h4>
                            </p>
                            </div>
                        </div>
                        <div class="col-md-4" style="    display: flex; justify-content: center; align-content: center; align-items: center;">
                            <img
                            src="{{ asset('img/administracion.png') }}"
                            src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start"
                            />
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection