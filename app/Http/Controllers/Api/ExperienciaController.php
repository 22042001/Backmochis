<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function index()
    {
        $experiencias = Experiencia::all();
        return response()->json($experiencias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $experiencia = Experiencia::create($request->all());
        return response()->json($experiencia, 201);
    }

    public function show($id)
    {
        $experiencia = Experiencia::findOrFail($id);
        return response()->json($experiencia);
    }

    public function update(Request $request, $id)
    {
        $experiencia = Experiencia::findOrFail($id);

        $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
        ]);

        $experiencia->update($request->all());
        return response()->json($experiencia);
    }

    public function destroy($id)
    {
        $experiencia = Experiencia::findOrFail($id);
        $experiencia->delete();
        return response()->json(null, 204);
    }
}
