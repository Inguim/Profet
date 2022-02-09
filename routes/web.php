<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProjetoSearch;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/ajuda', function () {
    return view('ajuda');
})->name('ajuda');

Route::get('/message', function () {
    return view('message');
})->name('message');


Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('usuario', PerfilController::class);
    Route::resource('notificacao', NotificacaoController::class)->only(['show']);

    Route::get('/administrativa/{path?}', [AdminController::class, 'index'])
        ->where('path', '.*')
        ->middleware(['admin'])
        ->name('admin');

    Route::get('/projeto/novo', [ProjetoController::class, 'create'])
        ->middleware(['userStatus'])
        ->name('novoprojeto');

    Route::get('/projeto/edit/{id}/{alteracao?}', [ProjetoController::class, 'edit'])->name('editProjeto');
    Route::put('/projeto/update/{id}', [ProjetoController::class, 'update'])->name('updateProjeto');
    Route::get('/projeto/destroy/{id}', [ProjetoController::class, 'destroy'])->name('deleteProjeto');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('categoria', CategoriaController::class)->only(['show']);
Route::get('/projeto/{id}', [ProjetoController::class, 'show'])->name('visualizarProjeto');
Route::get('/projeto', [ProjetoSearch::class, 'show'])->name('searchProjeto');
Route::get('/projeto/pdf/{id}', [PdfController::class, 'file'])->name('projetoPDF');
