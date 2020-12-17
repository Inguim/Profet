<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/administrativa/{path?}', [AdminController::class, 'index'])->where('path', '.*')->middleware(['auth']);;
Route::get('/novoprojeto', function() { return view('projeto/novoprojeto');})->name('novoprojeto');;
Route::get('/perfil', function() { return view('perfil');})->name('perfil');;
Route::get('/ajuda', function() { return view('ajuda');})->name('ajuda');;
Route::get('/CienciasAgrarias', function() { return view('categorias/agrarias');})->name('agrarias');;
Route::get('/CienciasBiologicas', function() { return view('categorias/biologicas');})->name('biologicas');;
Route::get('/CienciasdaSaude', function() { return view('categorias/saude');})->name('saude');;
Route::get('/CienciasExatasedaTerra', function() { return view('categorias/exatas');})->name('exatas');;
Route::get('/CienciasHumanas', function() { return view('categorias/humanas');})->name('humanas');;
Route::get('/CienciasSociaisAplicadas', function() { return view('categorias/sociais');})->name('sociais');;
Route::get('/Engenharias', function() { return view('categorias/engenharias');})->name('engenharias');;
Route::get('/LinguísticaLetrasArtes', function() { return view('categorias/letras');})->name('letras');;
Route::get('/Multidisciplinar', function() { return view('categorias/multi');})->name('multi');;


