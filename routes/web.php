<?php
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\CompetenciasController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\FichasController;
use App\Http\Controllers\NotasController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

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
    return view('auth.login');
});


Route::middleware(Authenticate::class)->group(function(){
    Route::resource('/aprendiz', AprendizController::class);
    Route::resource('/instructores',InstructorController::class);
    Route::resource('/competencias',CompetenciasController::class);
    Route::resource('/fichas',FichasController::class);
    Route::resource('/notas',NotasController::class)->parameters(['notas'=>'fichas']);
    Route::patch('/fichas/{id}/instructores',[FichasController::class,'updateInstructor'])->name('ficha.instructores.new');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Auth::routes();

