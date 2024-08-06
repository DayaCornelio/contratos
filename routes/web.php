<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'auth/login')->name('Inicio');

Route::view('/Inicio', 'Inicio')->name('inicio');

Route::post('/Inicio', [LoginController::class, 'logout'])->middleware('auth');

Auth::routes();

Route::get('/Inicio', [HomeController::class,'index'])->name('Inicio')->middleware('auth');

Route::get('/Formulario', [FormularioController::class, 'index'])->name('Formulario')->middleware('auth');;

Route::get('/Formulario', [FormularioController::class, 'index'])->name('Formulario');

Route:: post('/Formulario', [FormularioController::class, 'store'])->middleware('auth');;
Route:: get('/Formulario/{id}/Edit', [FormularioController::class, 'edit'])->middleware('auth');;
Route:: put('/Formulario/{id}', [FormularioController::class, 'update'])->name('formulario.update')->middleware('auth');;
Route:: delete('/Formulario/{id}', [FormularioController::class, 'destroy'])->middleware('auth');;


Route::get('archivo/{id}/eliminar', [ArchivoController::class, 'eliminar'])->name('archivo.eliminar')->middleware('auth');;

Route::post('/upload', [FileUploadController::class, 'upload'])->name('file.upload')->middleware('auth');;



