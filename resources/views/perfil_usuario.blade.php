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
                                <h5 class="card-title">Bienvenido/a usuario {{ Auth::user()->nombre_completo }}</h5>
                                <p class="card-text">
                                    En estavista podra encontrar todos sus datos registrados, tambien si desea los puedes editar 
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4" style="    display: flex; justify-content: center; align-content: center; align-items: center;">
                            <img
                            src="{{ asset('img/equipo.png') }}"
                            src=""
                            alt=""
                            class="img-fluid rounded-start"
                            />
                        </div>
                    </div>
                </div>
                <hr>
                <form name="form_registrar_usuario" id="form_registrar_usuario">
                    @csrf
                    <input hidden type="text" id="tipo_usuario" name="tipo_usuario" class="form-control" value="ESTANDAR"/>
                    <input hidden type="text" id="id" name="id" class="form-control" value="{{Auth::user()->id}}"/>

                    <div class="row mb-4">
                        <div class="col">
                            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" value="{{Auth::user()->nombre_completo}}" required/>
                            <label class="form-label mt-1" for=""><b>Nombre Completo</b></label>
                        </div>
                        <div class="col">
                            <input type="email" name="email" id="email"  class="form-control" value="{{Auth::user()->email}}" required/>
                            <label class="form-label mt-1" for=""><b>Correo</b></label>
                        </div>
                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control" value="{{Auth::user()->password}}" required/>
                            <label class="form-label mt-1" for=""><b>Contraseña</b></label>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <select class="form-control" name="tipo_documento" id="tipo_de_documento" value="{{Auth::user()->tipo_documento}}" required>
                                <option value="{{Auth::user()->tipo_documento}}">{{Auth::user()->tipo_documento}}</option>
                                <option value="Cedula de ciudadanía">Cedula de ciudadanía</option>
                                <option value="Cedula extranjera">Cedula extranjera</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                            <label for="tipo_de_documento"><b>Tipo de documento</b> </label>
                        </div>                              
                        <div class="col">
                            <input type="number" name="documento" id="documento" class="form-control" value="{{Auth::user()->documento}}" required/>
                            <label class="form-label mt-1" for=""><b>Documento</b></label>
                        </div>
                        <div class="col">
                            <input type="select" id="ciudad" name="ciudad" class="form-control" value="{{Auth::user()->ciudad}}"/>
                            <label class="form-label mt-1" for=""><b>Ciudad</b></label>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{Auth::user()->fecha_nacimiento}}" required/>
                            <label class="form-label mt-1" for=""><b>Fecha de nacimiento</b></label>
                        </div>
                        <div class="col">
                            <b>¿Desea subir comprobante?</b>
                            <div class="form-check form-switch">
                                <input hidden type="text" id="subir_comprobante_value" name="subir_comprobante" class="form-control" value="No"/>
                                <input class="form-check-input" type="checkbox" role="switch" id="subir_comprobante">
                                <label class="form-check-label" for="subir_comprobante">El comprobante no es obligatorio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div>
                            <label for="comprobante" class="form-label">Comprobante solo srchivos (PDF,DOCX,JPG,NPG)</label>
                            <input disabled class="form-control form-control-lg" id="comprobante" name="comprobante" type="file">
                        </div>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit" id="registrar_estandar">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection