<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destino;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    public function index()
    {
        $destinos = Destino::all();
        return response()->json($destinos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pais' => 'required|exists:paises,id_pais',
            'nombre' => 'required|max:100',
        ]);

        $destino = Destino::create($request->all());
        return response()->json($destino, 201);
    }

    public function show($id)
    {
        $destino = Destino::findOrFail($id);
        return response()->json($destino);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pais' => 'exists:paises,id_pais',
            'nombre' => 'max:100',
        ]);

        $destino = Destino::findOrFail($id);
        $destino->update($request->all());
        return response()->json($destino);
    }

    public function destroy($id)
    {
        $destino = Destino::findOrFail($id);
        $destino->delete();
        return response()->json(null, 204);
    }
}