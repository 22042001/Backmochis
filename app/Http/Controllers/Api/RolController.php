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
        return response()->json(['message' => 'Listado de países']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|max:50',
        ]);

        $rol = Rol::create($request->all());
        return response()->json($rol, 201);
    }

    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return response()->json($rol);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_rol' => 'max:50',
        ]);

        $rol = Rol::findOrFail($id);
        $rol->update($request->all());
        return response()->json($rol);
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return response()->json(null, 204);
    }
}