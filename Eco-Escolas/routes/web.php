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
Route::get('/noticias/tipo/{id}', [NoticiasController::class,'noticiasPorTipo'])->name('noticia.by.tipo');
Route::get('/noticias/create', [NoticiasController::class,'create'])->name('noticia.create')->middleware('auth');
Route::get('/noticias/edit/{id}', [NoticiasController::class,'edit'])->name('noticia.edit')->middleware('auth');
Route::post('/noticias', [NoticiasController::class,'store'])->name('noticia.store')->middleware('auth');
Route::get('/noticias/{id}', [NoticiasController::class,'show'])->name('noticia.show');
Route::delete('/noticias/{id}', [NoticiasController::class,'destroy'])->name('noticia.destroy')->middleware('auth');
Route::put('/noticias/{id}', [NoticiasController::class,'update'])->name('noticia.update')->middleware('auth');
//Route::get('/detalhes', [NoticiasController::class,'index']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
