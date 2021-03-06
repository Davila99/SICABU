<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CarreraController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TurnoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// }); // comantando la ruta de bienvenida de laravel

Route::get('/', function () {

    return view('auth.login');
    });

Route::resource('carrera', CarreraController::class)->middleware('auth');

Route::resource('estudiante', EstudianteController::class)->middleware('auth');

Route::resource('turno', TurnoController::class)->middleware('auth');

Route::resource('actividad', ActividadController::class)->middleware('auth');

Route::resource('reporte', ReporteController::class)->middleware('auth');

Route::resource('area', AreaController::class)->middleware('auth');

Route::resource('permiso', PermisosController::class)->middleware('auth');

Auth::routes(['register'=>false, 'reset'=>false]);
Route::get('/home', [EstudianteController::class,'index'])->name('home');
Route::group(['middeleware' => 'auth'], function() {

    Route::get('/home', [EstudianteController::class,'index'])->name('home');

});


// Route::resource('estudiante', EstudianteController::class)->middleware('auth');; //esta parte hace referecia a la carpeta de recursos donde tenemos todos los blades

// Route::get('estudiantes/index',[EstudianteController::class,'index'])->name('index');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
