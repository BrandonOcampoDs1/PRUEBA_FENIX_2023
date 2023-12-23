<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_usuario');
            $table->string('nombre_completo');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('tipo_documento')->nullable();
            $table->integer('documento')->nullable();
            $table->string('ciudad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('subir_comprobante')->nullable();
            $table->binary('comprobante')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
