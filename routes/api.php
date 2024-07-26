<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\PaisController;
use App\Http\Controllers\Api\DestinoController;
use App\Http\Controllers\Api\ExperienciaController;
use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\ForoTemaController;
use App\Http\Controllers\Api\ForoRespuestaController;
use App\Http\Controllers\Api\ValoracionController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('me', [AuthController::class, 'me']);
});

// Rutas para RolController
Route::get('/roles', [RolController::class, 'index']);
Route::post('/roles', [RolController::class, 'store']);
Route::get('/roles/{id}', [RolController::class, 'show']);
Route::put('/roles/{id}', [RolController::class, 'update']);
Route::delete('/roles/{id}', [RolController::class, 'destroy']);

// Rutas para UsuarioController
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

// Rutas para PaisController
Route::get('/paises', [PaisController::class, 'index']);
Route::post('/paises', [PaisController::class, 'store']);
Route::get('/paises/{id}', [PaisController::class, 'show']);
Route::put('/paises/{id}', [PaisController::class, 'update']);
Route::delete('/paises/{id}', [PaisController::class, 'destroy']);

// Rutas para DestinoController
Route::get('/destinos', [DestinoController::class, 'index']);
Route::post('/destinos', [DestinoController::class, 'store']);
Route::get('/destinos/{id}', [DestinoController::class, 'show']);
Route::put('/destinos/{id}', [DestinoController::class, 'update']);
Route::delete('/destinos/{id}', [DestinoController::class, 'destroy']);

// Rutas para ExperienciaController
Route::get('/experiencias', [ExperienciaController::class, 'index']);
Route::post('/experiencias', [ExperienciaController::class, 'store']);
Route::get('/experiencias/{id}', [ExperienciaController::class, 'show']);
Route::put('/experiencias/{id}', [ExperienciaController::class, 'update']);
Route::delete('/experiencias/{id}', [ExperienciaController::class, 'destroy']);

// Rutas para ComentarioController
Route::get('/comentarios', [ComentarioController::class, 'index']);
Route::post('/comentarios', [ComentarioController::class, 'store']);
Route::get('/comentarios/{id}', [ComentarioController::class, 'show']);
Route::put('/comentarios/{id}', [ComentarioController::class, 'update']);
Route::delete('/comentarios/{id}', [ComentarioController::class, 'destroy']);

// Rutas para ForoTemaController
Route::get('/foro-temas', [ForoTemaController::class, 'index']);
Route::post('/foro-temas', [ForoTemaController::class, 'store']);
Route::get('/foro-temas/{id}', [ForoTemaController::class, 'show']);
Route::put('/foro-temas/{id}', [ForoTemaController::class, 'update']);
Route::delete('/foro-temas/{id}', [ForoTemaController::class, 'destroy']);

// Rutas para ForoRespuestaController
Route::get('/foro-respuestas', [ForoRespuestaController::class, 'index']);
Route::post('/foro-respuestas', [ForoRespuestaController::class, 'store']);
Route::get('/foro-respuestas/{id}', [ForoRespuestaController::class, 'show']);
Route::put('/foro-respuestas/{id}', [ForoRespuestaController::class, 'update']);
Route::delete('/foro-respuestas/{id}', [ForoRespuestaController::class, 'destroy']);

// Rutas para ValoracionController
Route::get('/valoraciones', [ValoracionController::class, 'index']);
Route::post('/valoraciones', [ValoracionController::class, 'store']);
Route::get('/valoraciones/{id}', [ValoracionController::class, 'show']);
Route::put('/valoraciones/{id}', [ValoracionController::class, 'update']);
Route::delete('/valoraciones/{id}', [ValoracionController::class, 'destroy']);
