

$(document).ready(function() {
    $("#registro_tipo_usuario").change(function() {
        // Obtener el estado del switch
        var estadoSwitch = $(this).is(":checked");
        if (estadoSwitch == true) {
            $("#tipo_de_documento").prop('disabled', true).prop('required', false);
            $("#documento").prop('disabled', true).prop('required', false);
            $("#ciudad").prop('disabled', true);
            $("#fecha_nacimiento").prop('disabled', true).prop('required', false);
            $("#subir_comprobante").prop('disabled', true);
            $("#registrar_admin").prop('disabled', false);
            $("#registrar_estandar").prop('disabled', true);

            $("#tipo_usuario").val("ADMIN");
            
            
        }else{
            $("#tipo_de_documento").prop('disabled', false).prop('required', true);
            $("#nombre_completo").prop('disabled', false).prop('required', true);
            $("#documento").prop('disabled', false).prop('required', true);
            $("#ciudad").prop('disabled', false);
            $("#fecha_nacimiento").prop('disabled', false).prop('required', true);
            $("#subir_comprobante").prop('disabled', false);
            $("#registrar_admin").prop('disabled', true);
            $("#registrar_estandar").prop('disabled', false);
            
            $("#tipo_usuario").val("ESTANDAR");
            
        }
        // Hacer algo con el estado (en este caso, mostrar en consola)
        console.log("El estado del switch es: " + estadoSwitch);
    });
    
    
    // DESABILITAR PARA SUBIR COMPROBANTE
    $("#subir_comprobante").change(function() {
        // Obtener el estado del switch
        var comprobante = $(this).is(":checked");
        if (comprobante == true) {
            $("#comprobante").prop('disabled', false);
            $("#subir_comprobante_value").val("Si");
            $("#subir_comprobante").val(true);
        }else{
            $("#comprobante").prop('disabled', true);
            $("#subir_comprobante_value").val("No");
            $("#subir_comprobante").val(false);
        }
        // Hacer algo con el estado (en este caso, mostrar en consola)
        console.log("El estado aadel switch es: " + comprobante);
    });

    $("#editar_usuario").change(function() {
        if ($('#editar_usuario').hasClass('show')) {
            console.log('El modal está abierto');
        } else {
            console.log('El modal está cerrado');
        }
    })

});


$(document).on("submit","#form_registrar_usuario", function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'post',
        url: "/RegistrarUsuario",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            // RESETEAMOS EL FORMULARIO
            $("#form_registrar_usuario")[0].reset();
            // DAMOS UNA ALERTA DE QUE SE REGISTRO CORRECTAMENTE
            $.ambiance({
                title: "Operación exitosa",
                type: "success",
            });
            
            // RECARGAMAOS LA TABLA PARA QUE SE VEA REFLEJADO
            $ ('#tabla_usuarios_form').DataTable().ajax.reload();
            $ ('#tabla_usuarios').DataTable().ajax.reload();
            $('.modal_editar').modal('hide')

        },
        error: function(data){
            console.log(data);
        }
    });
})

// TABLA PARA MOSTRAR ULTIMOS USUARIOS REGISTRADOS
$(document).ready(function () {
    $('#tabla_usuarios_form').DataTable( {
        ajax: {
            url: "/Usuarios",
        },
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'tipo_usuario',
                name: 'tipo_usuario'
            },
            {
                data: 'nombre_completo',
                name: 'nombre_completo'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'tipo_documento',
                name: 'tipo_documento'
            },
            {
                data: 'documento',
                name: 'documento'
            },
            {
                data: 'ciudad',
                name: 'ciudad'
            },
            {
                data: 'fecha_nacimiento',
                name: 'fecha_nacimiento'
            },
        ],
        scrollX: true,
        retrieve: true,
        paging: false,
        aaSorting: [],
        scrollY: "250px",
        pageLength: "50",
        scrollCollapse: true,
        processing: true,
    });
});

$(document).ready(function () {
    $('#tabla_usuarios').DataTable( {
        ajax: {
            url: "/UsuariosControl",
        },

        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'tipo_usuario',
                name: 'tipo_usuario'
            },
            {
                data: 'nombre_completo',
                name: 'nombre_completo'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'tipo_documento',
                name: 'tipo_documento'
            },
            {
                data: 'documento',
                name: 'documento'
            },
            {
                data: 'ciudad',
                name: 'ciudad'
            },
            {
                data: 'fecha_nacimiento',
                name: 'fecha_nacimiento'
            },
            {
                data: 'administrar_v',
                name: 'administrar_v'
            }
        ],
        scrollX: true,
        retrieve: true,
        paging: false,
        aaSorting: [],
        scrollY: "500px",
        pageLength: "50",
        scrollCollapse: true,
        processing: true,
    });
});