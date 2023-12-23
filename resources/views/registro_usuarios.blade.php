@extends('layouts.app')

@section('content')
<div class="col py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    ¿Desea registrar un usuario <b>administrador</b>?
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="registro_tipo_usuario">
                        <b>NO </b><label class="form-check-label" for="registro_tipo_usuario"><b> / SI</b> </label>
                    </div>
                </div>
                <form name="form_registrar_usuario" id="form_registrar_usuario">
                    @csrf
                    {{-- ADMINISTRADORES --}}
                    <input hidden type="text" id="tipo_usuario" name="tipo_usuario" class="form-control" value="ESTANDAR"/>

                    <div class="row mb-4">
                        <div class="col">
                            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" required/>
                            <label class="form-label mt-1" for=""><b>Nombre Completo</b></label>
                        </div>
                        <div class="col">
                            <input type="email" name="email" id="email"  class="form-control" required/>
                            <label class="form-label mt-1" for=""><b>Correo</b></label>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control" required/>
                            <label class="form-label mt-1" for=""><b>Contraseña</b></label>
                        </div>
                        <div class="col">
                            <div>
                                <button id="registrar_admin" style="width: 100%" type="submit" class="btn btn-outline-success" disabled>Registrar</button>
                            </div>
                        </div>
                    </div>
                    {{-- ADMINISTRADORES --}}

                    {{-- ESTANDARES --}}
                    <div class="row mb-4">
                        <div class="col">
                            <select class="form-control" name="tipo_documento" id="tipo_de_documento" required>
                                <option value="">Tipo de documento</option>
                                <option value="Cedula de ciudadanía">Cedula de ciudadanía</option>
                                <option value="Cedula extranjera">Cedula extranjera</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                            <label for="tipo_de_documento">Tipo de documento</label>
                        </div>                              
                        <div class="col">
                            <input maxl="10" type="number" name="documento" id="documento" class="form-control" required/>
                            <label class="form-label mt-1" for=""><b>Documento</b></label>
                        </div>
                        <div class="col">
                            <input type="select" id="ciudad" name="ciudad" class="form-control" />
                            <label class="form-label mt-1" for=""><b>Ciudad</b></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <script>
                                // var fechaActual = new Date().toISOString().split('T')[0];
                                // document.getElementById('fecha_nacimiento').max = fechaActual;
                                // console.log(fechaActual)
                            </script>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required/>
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

                    {{-- ESTANDARES --}}
                    
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4" id="registrar_estandar">Crear Usuario</button>
                </form>
            </div>
            <hr>
            <div class="tabla_usuarios_form">
                {{-- DATATABLA CON LA LISTA DE LOS PRODUCTOS Y SUS ACCIONES PARA ADMINISTRAR --}}
                <table id="tabla_usuarios_form" class="display" style="width:100%">
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
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection