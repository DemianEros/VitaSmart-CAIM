<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/idyhome', [App\Http\Controllers\IDYHomeController::class, 'index'])->name('idyhome');

//estos son rutas para llas citas 
Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('appointments/show', [AppointmentController::class, 'show'])->name('appointments.show');
Route::get('appointments/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::put('appointments/update', [AppointmentController::class, 'update'])->name('appointments.update');
Route::delete('appointments/destroy', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

// Estas son rutas para pacientes
Route::get('/pacientes', [App\Http\Controllers\PacientesController::class, 'index'])->name('pacientes');
Route::get('/pacientes/crear', [App\Http\Controllers\PacientesController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes', [App\Http\Controllers\PacientesController::class, 'store'])->name('pacientes.store');
Route::get('/pacientes/editar', [App\Http\Controllers\PacientesController::class, 'edit'])->name('pacientes.edit');
Route::put('/pacientes/actualizar', [App\Http\Controllers\PacientesController::class, 'update'])->name('pacientes.update');
Route::delete('/pacientes/eliminar/{id}', [App\Http\Controllers\PacientesController::class, 'destroy'])->name('pacientes.destroy');


//Estas son rutas para admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');


Route::get('/bitacora', [App\Http\Controllers\BitacoraController::class, 'index'])->name('bitacora');
Route::get('/reportes', [App\Http\Controllers\ReportesController::class, 'index'])->name('reportes');
Route::get('/search', [App\Http\Controllers\PacientesController::class, 'search'])->name('search');

