<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            Log::info('Register attempt:', $request->all());

            $validatedData = $request->validate([
                'nombre' => 'required|string|max:100',
                'apellido' => 'nullable|string|max:100',
                'email' => 'required|string|email|max:100|unique:usuarios',
                'contraseña' => 'required|string|min:8',
                'id_rol' => 'required|exists:roles,id_rol'
            ]);

            Log::info('Validated data:', $validatedData);

            $usuario = Usuario::create([
                'nombre' => $validatedData['nombre'],
                'apellido' => $validatedData['apellido'],
                'email' => $validatedData['email'],
                'contraseña' => Hash::make($validatedData['contraseña']),
                'id_rol' => $validatedData['id_rol'],
            ]);

            Log::info('Usuario creado:', ['usuario' => $usuario]);

            $token = JWTAuth::fromUser($usuario);

            Log::info('Token generado:', ['token' => $token]);

            return response()->json(compact('usuario', 'token'), 201);
        } catch (\Exception $e) {
            Log::error('Error during registration:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error during registration', 'message' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'contraseña');

        Log::info('Credentials:', $credentials);

        if (!$token = JWTAuth::attempt(['email' => $credentials['email'], 'password' => $credentials['contraseña']])) {
            Log::error('Invalid credentials');
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        Log::info('Login successful, token:', ['token' => $token]);

        return response()->json(compact('token'));
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}
