<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Valoracion;
use Illuminate\Http\Request;

class ValoracionController extends Controller
{
    public function index()
    {
        $valoraciones = Valoracion::all();
        return response()->json($valoraciones);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_experiencia' => 'required|exists:experiencias,id_experiencia',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'puntuacion' => 'required|integer|min:1|max:5',
            'comentario_breve' => 'max:200',
        ]);

        $valoracion = Valoracion::create($request->all());
        return response()->json($valoracion, 201);
    }

    public function show($id)
    {
        $valoracion = Valoracion::findOrFail($id);
        return response()->json($valoracion);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_experiencia' => 'exists:experiencias,id_experiencia',
            'id_usuario' => 'exists:usuarios,id_usuario',
            'puntuacion' => 'integer|min:1|max:5',
            'comentario_breve' => 'max:200',
        ]);

        $valoracion = Valoracion::findOrFail($id);
        $valoracion->update($request->all());
        return response()->json($valoracion);
    }

    public function destroy($id)
    {
        $valoracion = Valoracion::findOrFail($id);
        $valoracion->delete();
        return response()->json(null, 204);
    }
}