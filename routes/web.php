<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controllerHEHE;

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [controllerHEHE::class, 'register']);

Route::post('/logout', [controllerHEHE::class, 'logout']); 
Route::post('/login', [controllerHEHE::class, 'login']);