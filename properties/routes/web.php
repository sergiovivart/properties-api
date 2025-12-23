<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// generar token personal para pruebas
Route::get('/GeneraTokenPersonal', function () {
    $user = \App\Models\User::first(); 
    $token = $user->createToken('API Token')->plainTextToken; // crea token
    return response()->json(['token' => $token]);
});
