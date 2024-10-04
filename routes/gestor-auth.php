<?php

use App\Http\Controllers\Gestor\Auth\LoginController;
use App\Http\Controllers\Gestor\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('gestor')->middleware('guest:gestor')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('gestor.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('gestor.login');
    Route::post('login', [LoginController::class, 'store']);

    
});

Route::prefix('gestor')->middleware('auth:gestor')->group(function () {
  //gestor dashboard
  Route::get('/dashboard', function () {
    return view('gestor.dashboard');
})->name('gestor.dashboard');

    Route::post('logout', [LoginController::class, 'destroy'])->name('gestor.logout');
});
