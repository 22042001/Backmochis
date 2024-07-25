<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ForoRespuesta;
use Illuminate\Http\Request;

class ForoRespuestaController extends Controller
{
    public function index()
    {
        $foroRespuestas = ForoRespuesta::all();
        return response()->json($foroRespuestas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tema' => 'required|exists:foro_temas,id_tema',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'contenido' => 'required|string',
        ]);

        $foroRespuesta = ForoRespuesta::create($request->all());
        return response()->json($foroRespuesta, 201);
    }

    public function show($id)
    {
        $foroRespuesta = ForoRespuesta::findOrFail($id);
        return response()->json($foroRespuesta);
    }

    public function update(Request $request, $id)
    {
        $foroRespuesta = ForoRespuesta::findOrFail($id);

        $request->validate([
            'id_tema' => 'exists:foro_temas,id_tema',
            'id_usuario' => 'exists:usuarios,id_usuario',
            'contenido' => 'string',
        ]);

        $foroRespuesta->update($request->all());
        return response()->json($foroRespuesta);
    }

    public function destroy($id)
    {
        $foroRespuesta = ForoRespuesta::findOrFail($id);
        $foroRespuesta->delete();
        return response()->json(null, 204);
    }
}
