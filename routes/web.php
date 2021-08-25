<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

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

Auth::routes(['register'=>false, 'reset'=>false]);

Route::resource('estudiante', EstudianteController::class)->middleware('auth');; //esta parte hace referecia a la carpeta de recursos donde tenemos todos los blades

Route::get('estudiantes/index',[EstudianteController::class,'index'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

