<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return response()->json($roles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_rol' => 'required|string|max:50',
        ]);

        $rol = new Rol();
        $rol->nombre_rol = $validatedData['nombre_rol'];
        $rol->save();

        return response()->json($rol, 201);
    }

    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return response()->json($rol);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre_rol' => 'sometimes|required|string|max:50',
        ]);

        $rol = Rol::findOrFail($id);
        if ($request->has('nombre_rol')) {
            $rol->nombre_rol = $validatedData['nombre_rol'];
        }
        $rol->save();

        return response()->json($rol);
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return response()->json(null, 204);
    }
}
