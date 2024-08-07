<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BitacoraController;

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

//Rutas para IDY World
Route::get('/idyhome', [App\Http\Controllers\IDYHomeController::class, 'index'])->name('idyhome');
Route::get('/sobrenosotros', [App\Http\Controllers\IDYHomeController::class, 'showsn'])->name('sobrenosotros');
Route::get('/equipo', [App\Http\Controllers\IDYHomeController::class, 'showeq'])->name('equipo');
Route::get('/contacto', [App\Http\Controllers\IDYHomeController::class, 'showcon'])->name('contacto');
Route::get('/carreras', [App\Http\Controllers\IDYHomeController::class, 'showcarr'])->name('carreras');


//estos son rutas para llas citas 
Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('appointments/create', [AppointmentController::class, 'create'])->middleware('can:appointments.create')->name('appointments.create');
Route::post('appointments', [AppointmentController::class, 'store'])->middleware('can:appointments.store')->name('appointments.store');
Route::get('appointments/show', [AppointmentController::class, 'show'])->middleware('can:appointments.show')->name('appointments.show');
Route::get('appointments/edit', [AppointmentController::class, 'edit'])->middleware('can:appointments.edit')->name('appointments.edit');
Route::put('appointments/update', [AppointmentController::class, 'update'])->middleware('can:appointments.update')->name('appointments.update');
Route::delete('appointments/destroy', [AppointmentController::class, 'destroy'])->middleware('can:appointments.destroy')->name('appointments.destroy');
Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
Route::put('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');


// Estas son rutas para pacientes
Route::get('/pacientes', [App\Http\Controllers\PacientesController::class, 'index'])->middleware('can:pacientes')->name('pacientes');
Route::get('/pacientes/crear', [App\Http\Controllers\PacientesController::class, 'create'])->middleware('can:pacientes.create')->name('pacientes.create');
Route::post('/pacientes', [App\Http\Controllers\PacientesController::class, 'store'])->middleware('can:pacientes.store')->name('pacientes.store');
Route::get('/pacientes/editar', [App\Http\Controllers\PacientesController::class, 'edit'])->middleware('can:pacientes.edit')->name('pacientes.edit');
Route::put('/pacientes/actualizar', [App\Http\Controllers\PacientesController::class, 'update'])->middleware('can:pacientes.update')->name('pacientes.update');
Route::delete('/pacientes/eliminar/{id}', [App\Http\Controllers\PacientesController::class, 'destroy'])->middleware('can:pacientes.destroy')->name('pacientes.destroy');



//Estas son rutas para admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('can:admin')->name('admin');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'listUsers'])->name('admin.users');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

//Estas son las tutas para Bitacora
Route::get('/bitacora', [App\Http\Controllers\BitacoraController::class, 'index'])->name('bitacora');
Route::get('bitacora/register', [App\Http\Controllers\BitacoraController::class, 'show'])->name('bitacora.registro');
Route::post('bitacora', [App\Http\Controllers\BitacoraController::class, 'store'])->name('bitacora.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/bitacora', [App\Http\Controllers\BitacoraController::class, 'index'])->middleware('can:bitacora')->name('bitacora');
    Route::put('/bitacora/update/{type}', [App\Http\Controllers\BitacoraController::class, 'update'])->name('bitacora.update');
});



Route::get('/search', [App\Http\Controllers\PacientesController::class, 'search'])->name('search');

