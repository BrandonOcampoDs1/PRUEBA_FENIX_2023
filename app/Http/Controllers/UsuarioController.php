<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UsuarioController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil_usuario');
    }

    public function index_usuarios ()
    {
        $Usuarios_get = User::get();

        if(request()->ajax())
            {
                $Usuarios_ajax = User::latest()->take(3)->get();
                // SELECT * FROM users ORDER BY id DESC LIMIT 3;
                return Datatables::of($Usuarios_ajax)   
                ->rawColumns(['administrar_v'])
                ->make(true);
        }

        return view('tabla_usuarios');
    }

    public function index_control_usuarios ()
    {
        $Usuarios_get = User::get();

        if(request()->ajax())
            {
                $Usuarios_ajax = User::get();
                // SELECT * FROM users ORDER BY id DESC LIMIT 3;
                return Datatables::of($Usuarios_ajax)   

                ->addColumn('administrar_v', function ($row){
                    $botones = 
                        '
                        <div class="botones_administrar">
                            
                            <button class="btn_administrar" data-bs-toggle="modal" data-bs-target="#editar_usuario'.$row->id.'">
                                <i class="text-success fas fa-edit"></i>
                            </button>

                            <form style="margin-left: 10px;" action="'.route('EliminarUsuario', $row->id) .'">
                                <button class="btn_administrar ml-4" type="submit">
                                    <i class="text-danger fas fa-trash"></i>
                                </button>
                            </form>

                        </div>                    
                        ';
                    return $botones;
                })

                ->rawColumns(['administrar_v'])
                ->make(true);
        }

        return view('tabla_usuarios', compact('Usuarios_get'));
    }

    public function registrar_usuario(Request $request)
    {
        // VALIDAMOS LOS CAMPOS
        $validated = $request->validate([
            'tipo_usuario' => 'required',
            'nombre_completo' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $id = $request->id;

        // REGISTRAMOS EL USUARIO EN LA BASE DE DATOS
        $fecha_hoy = date("Y-m-d H:i:s");
        $Registro_Usuario = User::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'tipo_usuario' => $request->tipo_usuario,
                'nombre_completo' => $request->nombre_completo,
                'email' => $request->email,
                'email_verified_at' => $fecha_hoy,
                'password' => $request->password,
                'tipo_documento' => $request->tipo_documento,
                'documento' => $request->documento,
                'ciudad' => $request->ciudad,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'subir_comprobante' => $request->subir_comprobante,
                'comprobante' => $request->comprobante,
            ]
        );

        return Response()->json($Registro_Usuario);

    }


    public function eliminar_usuario(User $id)
    {
        $id->delete();
        return redirect()->route('control.usuarios');
    }


}
