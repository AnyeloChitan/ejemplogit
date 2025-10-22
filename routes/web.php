<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VentaController;

Route::get('/',[WelcomeController::class,'welcome'])->name('welcome');

Route::post('/ventas',[VentaController::class,'store'])->name('ventas.store');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //rutas de ventas
    Route::resource('/ventas',VentaController::class)->except(['store']);

    //ruta categorias
    Route::resource('/categoria',CategoriaController::class);
    //ruta productos
    Route::resource('/producto',ProductoController::class);
    //pdf
    Route::get('/pdfProductos', [PdfController::class, 'pdfProductos'])->name('pdf.productos');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
