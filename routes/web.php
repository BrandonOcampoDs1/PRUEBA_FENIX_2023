<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();


Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/RegistrarUsuarios', [App\Http\Controllers\AdminController::class, 'registro_usuarios_v'])->name('index.usuarios');
Route::get('/ControlUsuarios', [App\Http\Controllers\AdminController::class, 'usuarios_v'])->name('control.usuarios');
Route::get('/perfil_usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->name('perfil_usuario.index');

Route::get('/Usuarios', [App\Http\Controllers\UsuarioController::class, 'index_usuarios'])->name('Index.usuarios');
Route::get('/UsuariosControl', [App\Http\Controllers\UsuarioController::class, 'index_control_usuarios'])->name('Index.usuarios');
Route::post('/RegistrarUsuario', [App\Http\Controllers\UsuarioController::class, 'registrar_usuario'])->name('Usuario_Registro');
Route::get('/EliminarUsuario/{id}', [App\Http\Controllers\UsuarioController::class, 'eliminar_usuario'])->name('EliminarUsuario');

