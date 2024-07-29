<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExperienciaController extends Controller
{
    public function index()
    {
        $experiencias = Experiencia::with(['usuario', 'destino'])->get();
        return response()->json($experiencias);
    }

    public function store(Request $request)
    {
        // Log the request data
        Log::info('Request data for store:', ['data' => $request->all()]);

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'id_usuario' => 'required|integer|exists:usuarios,id_usuario',
            'id_destino' => 'required|integer|exists:destinos,id_destino',
            'fecha_inicio_viaje' => 'nullable|date',
            'fecha_fin_viaje' => 'nullable|date',
            'estado' => 'nullable|in:borrador,publicado,archivado',
            'votos_positivos' => 'nullable|integer',
            'fotos' => 'nullable|image|max:2048'
        ]);

        try {
            $experiencia = new Experiencia($validatedData);

            if ($request->hasFile('fotos')) {
                $filePath = $request->file('fotos')->store('experiencias', 'public');
                $experiencia->fotos = $filePath;
            }

            $experiencia->save();

            // Log successful creation
            Log::info('Experiencia created successfully.', ['experiencia' => $experiencia->toArray()]);

            return response()->json($experiencia, 201);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating experiencia:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error creating experiencia', 'details' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $experiencia = Experiencia::with(['usuario', 'destino'])->findOrFail($id);
        return response()->json($experiencia);
    }

    public function update(Request $request, $id)
    {
        // Log the request data
        Log::info('Request data for update:', ['data' => $request->all()]);

        $experiencia = Experiencia::findOrFail($id);

        $validatedData = $request->validate([
            'titulo' => 'string|max:200',
            'descripcion' => 'string',
            'id_usuario' => 'integer|exists:usuarios,id_usuario',
            'id_destino' => 'integer|exists:destinos,id_destino',
            'fecha_inicio_viaje' => 'nullable|date',
            'fecha_fin_viaje' => 'nullable|date',
            'estado' => 'nullable|in:borrador,publicado,archivado',
            'votos_positivos' => 'nullable|integer',
            'fotos' => 'nullable|image|max:2048'
        ]);

        try {
            $experiencia->fill($validatedData);

            if ($request->hasFile('fotos')) {
                if ($experiencia->fotos) {
                    Storage::disk('public')->delete($experiencia->fotos);
                }

                $filePath = $request->file('fotos')->store('experiencias', 'public');
                $experiencia->fotos = $filePath;
            }

            $experiencia->save();

            // Log successful update
            Log::info('Experiencia updated successfully.', ['experiencia' => $experiencia->toArray()]);

            return response()->json($experiencia);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error updating experiencia:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error updating experiencia', 'details' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $experiencia = Experiencia::findOrFail($id);

            if ($experiencia->fotos) {
                Storage::disk('public')->delete($experiencia->fotos);
            }

            $experiencia->delete();

            // Log successful deletion
            Log::info('Experiencia deleted successfully.', ['id' => $id]);

            return response()->json(null, 204);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error deleting experiencia:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error deleting experiencia', 'details' => $e->getMessage()], 500);
        }
    }
}
