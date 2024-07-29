<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return response()->json($paises);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_pais' => 'required|string|max:100',
        ]);

        $pais = Pais::create($request->only('nombre_pais'));
        return response()->json($pais, 201);
    }

    public function show($id)
    {
        $pais = Pais::findOrFail($id);
        return response()->json($pais);
    }

    public function update(Request $request, $id)
    {
        $pais = Pais::findOrFail($id);

        $request->validate([
            'nombre_pais' => 'string|max:100',
        ]);

        $pais->update($request->only('nombre_pais'));
        return response()->json($pais);
    }

    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);
        $pais->delete();
        return response()->json(null, 204);
    }
}
