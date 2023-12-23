<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // INSTANCIAMOS EL MODELO USER PARA INGRESARLE EL PRIMER REGISTRO POR DEFECTO CON LAS MIGRACIONES

        // INSERTAMOS DATOS DE USUARIO ADMIN
        $usuario = new User();
        $usuario->tipo_usuario = "ADMIN";
        $usuario->nombre_completo = "FENIX ADMIN";
        $usuario->email = "admin@admin.com";
        $usuario->password = "12345678";
        // CREAMOS LA FECHA ACTUAL PARA MARCAR COMO COMPROBADO EL EMAIL
        $fecha_hoy = date("Y-m-d H:i:s");
        $usuario->email_verified_at = $fecha_hoy;
        $usuario -> save();

        // INSERTAMOS DATOS DE USUARIO ESTANDAR
        $usuario = new User();
        $usuario->tipo_usuario = "ESTANDAR";
        $usuario->nombre_completo = "FENIX ESTANDAR";
        $usuario->email = "user@test.com";
        $fecha_hoy = date("Y-m-d H:i:s");
        $usuario->email_verified_at = $fecha_hoy;
        $usuario->password = "12345";
        $usuario->tipo_documento = 'Cedula de ciudadania';
        $usuario->documento = '1000290455';
        $usuario->ciudad = 'Medellin';
        $usuario->fecha_nacimiento = '2023-12-07';
        $usuario->subir_comprobante = 'No';
        $usuario->comprobante = '';
        $usuario -> save();

    }
}
