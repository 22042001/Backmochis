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
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_destino' => 'required|exists:destinos,id_destino',
            'titulo' => 'required|max:200',
            'fecha_inicio_viaje' => 'date',
            'fecha_fin_viaje' => 'date|after_or_equal:fecha_inicio_viaje',
            'estado' => 'in:borrador,publicado,archivado',
            'votos_positivos' => 'integer|min:0',
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
        $request->validate([
            'id_usuario' => 'exists:usuarios,id_usuario',
            'id_destino' => 'exists:destinos,id_destino',
            'titulo' => 'max:200',
            'fecha_inicio_viaje' => 'date',
            'fecha_fin_viaje' => 'date|after_or_equal:fecha_inicio_viaje',
            'estado' => 'in:borrador,publicado,archivado',
            'votos_positivos' => 'integer|min:0',
        ]);

        $experiencia = Experiencia::findOrFail($id);
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