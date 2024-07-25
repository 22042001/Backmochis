<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rol' => 'required|exists:roles,id_rol',
            'nombre' => 'required|max:100',
            'apellido' => 'max:100',
            'email' => 'required|email|unique:usuarios,email',
            'contraseña' => 'required|min:6',
            'fecha_nacimiento' => 'date',
            'genero' => 'max:20',
            'foto_perfil' => 'max:200',
        ]);

        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_rol' => 'exists:roles,id_rol',
            'nombre' => 'max:100',
            'apellido' => 'max:100',
            'email' => 'email|unique:usuarios,email,'.$id.',id_usuario',
            'contraseña' => 'min:6',
            'fecha_nacimiento' => 'date',
            'genero' => 'max:20',
            'foto_perfil' => 'max:200',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}