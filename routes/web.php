<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para la gestión de roles, permisos y notas
    Route::get('/roles', function () {
        return view('roles.index');
    })->name('roles.index');

    Route::get('/permisos', function () {
        return view('permisos.index');
    })->name('permisos.index');

    Route::get('/notas', function () {
        return view('user-notes.index');
    })->name('user-notes.index');
});

require __DIR__.'/auth.php';