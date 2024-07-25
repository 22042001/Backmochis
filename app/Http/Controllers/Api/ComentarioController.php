<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::all();
        return response()->json($comentarios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_experiencia' => 'required|exists:experiencias,id_experiencia',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'contenido' => 'required',
        ]);

        $comentario = Comentario::create($request->all());
        return response()->json($comentario, 201);
    }

    public function show($id)
    {
        $comentario = Comentario::findOrFail($id);
        return response()->json($comentario);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_experiencia' => 'exists:experiencias,id_experiencia',
            'id_usuario' => 'exists:usuarios,id_usuario',
            'contenido' => 'required',
        ]);

        $comentario = Comentario::findOrFail($id);
        $comentario->update($request->all());
        return response()->json($comentario);
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return response()->json(null, 204);
    }
}