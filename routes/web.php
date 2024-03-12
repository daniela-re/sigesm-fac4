<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthRoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsistenteController;

Route::get('/', [Controller::class,'welcome'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Ruta para redirecionar por rol una vez autenticado el usuario
    Route::get('/dashboard', [AuthRoleController::class, 'dashboard'])->name('dashboard');

    //Rutas para la configuracion del perfil
    Route::get('/profile', [AuthRoleController::class, 'profile'])->name('profile');
    

    //Rutas del Administrador
    Route::get('/admin/dashboard',   [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard_2', [AdminController::class, 'dashboard_2'])->name('admin.dashboard_2');
    Route::post('/admin/create',     [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/{id}/delete', [AdminController::class, 'delete'])->name('admin.delete');

    //Rutas del Asistente
    Route::get('/asistente/dashboard', [AsistenteController::class, 'dashboard'])->name('asistente.dashboard');
    Route::get('/asistente/dashboard_2', [AsistenteController::class, 'dashboard_2'])->name('asistente.dashboard_2');
    Route::post('/asistente/create', [AsistenteController::class, 'store'])->name('asistente.create');
    Route::post('/asistente/update', [AsistenteController::class, 'update'])->name('asistente.update');
    Route::get('/asistente/{id}/delete', [AsistenteController::class, 'delete'])->name('asistente.delete');
    Route::post('/asistente/utilizar', [AsistenteController::class, 'pasarASobrantes'])->name('asistente.utilizar');
   
});