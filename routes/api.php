<?php

use Illuminate\Support\Facades\Route;

// Ruta de prueba
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

// Rutas para el controlador RolController
Route::get('/rol', 'App\Http\Controllers\Api\RolController@index');
Route::post('/rol', 'App\Http\Controllers\Api\RolController@store');
Route::get('/roles/{id}', 'App\Http\Controllers\Api\RolController@show');
Route::put('/roles/{id}', 'App\Http\Controllers\Api\RolController@update');
Route::delete('/roles/{id}', 'App\Http\Controllers\Api\RolController@destroy');

// Rutas para el controlador UsuarioController
Route::get('/usuarios', 'App\Http\Controllers\Api\UsuarioController@index');
Route::post('/usuarios', 'App\Http\Controllers\Api\UsuarioController@store');
Route::get('/usuarios/{id}', 'App\Http\Controllers\Api\UsuarioController@show');
Route::put('/usuarios/{id}', 'App\Http\Controllers\Api\UsuarioController@update');
Route::delete('/usuarios/{id}', 'App\Http\Controllers\Api\UsuarioController@destroy');

// Rutas para el controlador PaisController
Route::get('/paises', 'App\Http\Controllers\Api\PaisController@index');
Route::post('/paises', 'App\Http\Controllers\Api\PaisController@store');
Route::get('/paises/{id}', 'App\Http\Controllers\Api\PaisController@show');
Route::put('/paises/{id}', 'App\Http\Controllers\Api\PaisController@update');
Route::delete('/paises/{id}', 'App\Http\Controllers\Api\PaisController@destroy');

// Rutas para el controlador DestinoController
Route::get('/destinos', 'App\Http\Controllers\Api\DestinoController@index');
Route::post('/destinos', 'App\Http\Controllers\Api\DestinoController@store');
Route::get('/destinos/{id}', 'App\Http\Controllers\Api\DestinoController@show');
Route::put('/destinos/{id}', 'App\Http\Controllers\Api\DestinoController@update');
Route::delete('/destinos/{id}', 'App\Http\Controllers\Api\DestinoController@destroy');

// Rutas para el controlador ExperienciaController
Route::get('/experiencias', 'App\Http\Controllers\Api\ExperienciaController@index');
Route::post('/experiencias', 'App\Http\Controllers\Api\ExperienciaController@store');
Route::get('/experiencias/{id}', 'App\Http\Controllers\Api\ExperienciaController@show');
Route::put('/experiencias/{id}', 'App\Http\Controllers\Api\ExperienciaController@update');
Route::delete('/experiencias/{id}', 'App\Http\Controllers\Api\ExperienciaController@destroy');

// Rutas para el controlador ComentarioController
Route::get('/comentarios', 'App\Http\Controllers\Api\ComentarioController@index');
Route::post('/comentarios', 'App\Http\Controllers\Api\ComentarioController@store');
Route::get('/comentarios/{id}', 'App\Http\Controllers\Api\ComentarioController@show');
Route::put('/comentarios/{id}', 'App\Http\Controllers\Api\ComentarioController@update');
Route::delete('/comentarios/{id}', 'App\Http\Controllers\Api\ComentarioController@destroy');

// Rutas para el controlador ForoTemaController
Route::get('/foro-temas', 'App\Http\Controllers\Api\ForoTemaController@index');
Route::post('/foro-temas', 'App\Http\Controllers\Api\ForoTemaController@store');
Route::get('/foro-temas/{id}', 'App\Http\Controllers\Api\ForoTemaController@show');
Route::put('/foro-temas/{id}', 'App\Http\Controllers\Api\ForoTemaController@update');
Route::delete('/foro-temas/{id}', 'App\Http\Controllers\Api\ForoTemaController@destroy');

// Rutas para el controlador ForoRespuestaController
Route::get('/foro-respuestas', 'App\Http\Controllers\Api\ForoRespuestaController@index');
Route::post('/foro-respuestas', 'App\Http\Controllers\Api\ForoRespuestaController@store');
Route::get('/foro-respuestas/{id}', 'App\Http\Controllers\Api\ForoRespuestaController@show');
Route::put('/foro-respuestas/{id}', 'App\Http\Controllers\Api\ForoRespuestaController@update');
Route::delete('/foro-respuestas/{id}', 'App\Http\Controllers\Api\ForoRespuestaController@destroy');

// Rutas para el controlador ValoracionController
Route::get('/valoraciones', 'App\Http\Controllers\Api\ValoracionController@index');
Route::post('/valoraciones', 'App\Http\Controllers\Api\ValoracionController@store');
Route::get('/valoraciones/{id}', 'App\Http\Controllers\Api\ValoracionController@show');
Route::put('/valoraciones/{id}', 'App\Http\Controllers\Api\ValoracionController@update');
Route::delete('/valoraciones/{id}', 'App\Http\Controllers\Api\ValoracionController@destroy');
