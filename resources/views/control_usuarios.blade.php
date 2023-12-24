@extends('layouts.app')

@section('content')
<div class="col py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <b>Acá podrá ver la lista de los <b class="text-danger">{{$cantidadRegistros}} </b> usuarios registrados y podra editar o eliminar si lo desea</b>
                </div>
            </div>
            <hr>
            <div class="tabla_usuarios">
                {{-- DATATABLA CON LA LISTA DE LOS USUARIOS --}}
                <table id="tabla_usuarios" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo de usuario</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo de documento</th>
                            <th>Documento</th>
                            <th>Ciudad</th>
                            <th>Fecha de nacimiento</th>
                            <th>Gestionar</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
            @foreach ($Usuarios_get as $row)
                <div class="modal fade modal_editar" id="editar_usuario{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar <b>Usuario</b></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form class="row form_registrar_usuario" id="form_registrar_usuario">
                                    <input type="hidden" name="id" value="{{$row->id}}">
                                    @csrf
                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Nombre completo</label>
                                        <input required class="form-control" type="text" value="{{$row->nombre_completo}}" name="nombre_completo" id="nombre_completo" placeholder="Nombre Completo">
                                    </div>

                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Email</label>
                                        <input required class="form-control" type="email" value="{{$row->email}}" name="email" id="email" placeholder="Email">
                                    </div>

                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Tipo de documento</label>
                                        <select class="form-control" name="tipo_documento" id="tipo_documento" >
                                            <option value="{{$row->tipo_documento}}">{{$row->tipo_documento}}</option>
                                            <option value="Cedula de ciudadanía">Cedula de ciudadanía</option>
                                            <option value="Cedula extranjera">Cedula extranjera</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Documento</label>
                                        <input class="form-control" type="number" value="{{$row->documento}}" name="documento" id="documento" placeholder="Documento" >
                                    </div>

                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Tipo de usuario</label>
                                        <select class="form-control" name="tipo_usuario" id="tipo_usuario" required>
                                            <option value="{{$row->tipo_usuario}}">{{$row->tipo_usuario}}</option>
                                            <option value="ADMIN">ADMIN</option>
                                            <option value="ESTANDAR">ESTANDAR</option>
                                        </select>
                                    </div>
                            
                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Ciudad</label>
                                        <input class="form-control" type="text" value="{{$row->ciudad}}" name="ciudad" id="ciudad" placeholder="Ciudad">
                                    </div>

                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Fecha de nacimiento</label>
                                        <input class="form-control" type="date" value="{{$row->fecha_nacimiento}}" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento">
                                    </div>

                                    <div class="mb-3 col-lg-4 col-sm-6">
                                        <label>Contraseña</label>
                                        <input class="form-control" type="password"  name="password" id="password" value="{{$row->password}}" placeholder="Nueva contraseña">
                                    </div>

                                    <div class="col-12 mb-3 display-grid">
                                        <button style="width: 100%" type="submit" class="btn btn-primary btn_home mt-2">
                                            <i class="fas fa-plus-square me-2 vertical-align-middle" style="font-size: 1.2em;"></i>
                                            Registrar
                                        </button>
                                    </div>

                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection