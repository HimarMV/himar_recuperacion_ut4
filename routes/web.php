<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
   Route::get('/admin/dashboard', function () {
       return view('admin.dashboard');
   })->name('admin.dashboard');

   // Tickets
   Route::get('/admin/tickets', [App\Http\Controllers\TicketsController::class, 'index'])
       ->name('admin.ticket.index');
   Route::get('/admin/tickets/create', [App\Http\Controllers\TicketsController::class, 'create'])
       ->name('admin.ticket.create');
   Route::post('/admin/tickets', [App\Http\Controllers\TicketsController::class, 'store'])
       ->name('admin.ticket.store');
});

// Rutas generadas por Jetstream para autenticación y dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});