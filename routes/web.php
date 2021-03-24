<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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


Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('usuario', PerfilController::class);

    Route::get('/administrativa/{path?}', [AdminController::class, 'index'])
        ->where('path', '.*')
        ->middleware(['admin'])
        ->name('admin');

    Route::get('/projeto/novo', [ProjetoController::class, 'create'])->name('novoprojeto');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('categoria', CategoriaController::class);

