<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\CRM\Properties\Controllers\AvailablePropertiesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas API para tu aplicación. Estas
| rutas son cargadas por RouteServiceProvider dentro del grupo "api"
| que contiene el prefijo "api".
|
*/

// Ruta de prueba para verificar que el API funciona
Route::get('/ping', function() {
    return response()->json(['pong' => true]);
});


// Endpoint de propiedades disponibles para operaciones
Route::middleware('auth:sanctum')->group(function () {
    Route::get(
        '/properties/available-for-operations',
        [AvailablePropertiesController::class, 'index']
    );
});