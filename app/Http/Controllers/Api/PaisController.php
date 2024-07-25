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
            'nombre_pais' => 'required|max:100',
        ]);

        $pais = Pais::create($request->all());
        return response()->json($pais, 201);
    }

    public function show($id)
    {
        $pais = Pais::findOrFail($id);
        return response()->json($pais);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_pais' => 'max:100',
        ]);

        $pais = Pais::findOrFail($id);
        $pais->update($request->all());
        return response()->json($pais);
    }

    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);
        $pais->delete();
        return response()->json(null, 204);
    }
}