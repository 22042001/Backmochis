<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'apellido' => 'nullable|string|max:100',
            'email' => 'required|string|email|max:100|unique:usuarios',
            'contraseña' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'contraseña' => Hash::make($request->contraseña),
            'id_rol' => 6,
        ]);

        $token = JWTAuth::fromUser($usuario);

        return response()->json(compact('usuario', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'contraseña');

        // Intentar autenticar al usuario con las credenciales proporcionadas
        if (!$token = JWTAuth::attempt(['email' => $credentials['email'], 'password' => $credentials['contraseña']])) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}
