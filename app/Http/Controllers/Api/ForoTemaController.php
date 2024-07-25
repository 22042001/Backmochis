<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ForoTema;
use Illuminate\Http\Request;

class ForoTemaController extends Controller
{
    public function index()
    {
        $foroTemas = ForoTema::all();
        return response()->json($foroTemas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $foroTema = ForoTema::create($request->all());
        return response()->json($foroTema, 201);
    }

    public function show($id)
    {
        $foroTema = ForoTema::findOrFail($id);
        return response()->json($foroTema);
    }

    public function update(Request $request, $id)
    {
        $foroTema = ForoTema::findOrFail($id);

        $request->validate([
            'titulo' => 'string|max:255',
            'descripcion' => 'string',
        ]);

        $foroTema->update($request->all());
        return response()->json($foroTema);
    }

    public function destroy($id)
    {
        $foroTema = ForoTema::findOrFail($id);
        $foroTema->delete();
        return response()->json(null, 204);
    }
}
