<?php

use App\Http\Controllers\miControlador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\coches;
use App\Http\Controllers\personas;
use App\Http\Controllers\alquileres;
use App\Http\Middleware\midAdmin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('listar', [miControlador::class, 'listar']);

Route::get('pruebafaker', [miControlador::class, 'pruebaFaker']);


// Route::get('actualizarCoche/{matricula}/{modelo}',function($matricula){
//     return response()->json(['mensaje'=>'Actualizado coche '.$matricula],200);
// })->whereAlphaNumeric('matricula');

// Route::get('borrarCoche/{matricula}',function($matricula){
//     return response()->json(['mensaje'=>'Borrado coche '.$matricula],200);
// })->whereAlphaNumeric('matricula');
// Route::get('listarCoches',[miControlador::class,'listarCoches']);

//  Route::get ('insertarCoche/{Matricula}/{Marca}/{Modelo}',function($matricula,$marca,$modelo){
//     return response()->json(['mensaje'=>'Insertado coche '.$matricula." ".$marca." ".$modelo],200);
//  });
Route::middelware('auth:sanctum')->group(function () { //las rutas no me funcionan con controller prefix....

    Route::get('listarCoches', [coches::class, 'listarCoches'])->middleware(['midAdmin', 'midUser']);

    Route::post('insertarCoche', [coches::class, 'insertarCoche'])->middleware('midAdmin');

    Route::put('actualizarCoches/{matricula}', [coches::class, 'actualizarCoches'])->middleware('midAdmin');

    Route::delete('borrarCoche/{matricula}', [coches::class, 'borrarCoche'])->middleware('midAdmin');
});
Route::name('personas')->group(function () {

    Route::get('listarpersonas', [personas::class, 'listarpersonas'])->middleware(['midAdmin', 'midUser']); // no funciona con controller prefix lo he tenido que quitar

    Route::post('insertarpersona', [personas::class, 'insertarpersona'])->middleware('midAdmin');

    Route::put('actualizarpersonas/{DNI}', [personas::class, 'actualizarpersonas'])->middleware('midAdmin');

    Route::delete('borrarpersona/{DNI}', [personas::class, 'borrarpersona'])->middleware('midAdmin');
});
Route::name('alquileres')->group(function () {

    Route::get('listaralquileres', [alquileres::class, 'listaralquileres'])->middleware(['midAdmin', 'midUser']); // NO funciona con controller prefix lo he tenido que quitar

    Route::post('insertaralquiler', [alquileres::class, 'insertaralquiler'])->middleware('midAdmin');

    Route::put('actualizaralquileres/{id_alquiler}', [alquileres::class, 'actualizaralquileres'])->middleware('midAdmin');

    Route::delete('borraralquiler/{id_alquiler}', [alquileres::class, 'borraralquiler'])->middleware('midAdmin');

    Route::get('buscaralquiler/{DNI}', [alquileres::class, 'buscaralquiler'])->middleware(['midAdmin', 'midUser']);


});

Route::post('/users/login', [AuthController::class, 'login'])->middleware(["midAdmin", "midUser"]);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('/users/register', [AuthController::class, 'register']);

// Path: routes\web.php
