<?php

use App\Http\Controllers\NoticiasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/noticias', [NoticiasController::class,'index'])->name('noticia.index');
Route::get('/noticias/create', [NoticiasController::class,'create'])->name('noticia.create');
Route::post('/noticias', [NoticiasController::class,'store'])->name('noticia.store');
Route::get('/noticias/{id}', [NoticiasController::class,'show'])->name('noticia.show');
Route::delete('/noticias/{id}', [NoticiasController::class,'destroy'])->name('noticia.destroy');

//Route::get('/detalhes', [NoticiasController::class,'index']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
