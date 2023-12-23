<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cantidadRegistros = User::count();
        return view('admin', compact('cantidadRegistros'));
    }

    public function registro_usuarios_v()
    {
        return view('registro_usuarios');
    }

    public function usuarios_v()
    {
        $cantidadRegistros = User::count();
        $Usuarios_get = User::get();
        return view('control_usuarios', compact('cantidadRegistros', 'Usuarios_get'));
    }


}
