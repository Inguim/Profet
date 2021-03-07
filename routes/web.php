<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerfilController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/novoprojeto', function () {
    return view('projeto/novoprojeto');
})->name('novoprojeto');


Route::get('/ajuda', function () {
    return view('ajuda');
})->name('ajuda');


Route::resource('categoria', CategoriaController::class);

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('usuario', PerfilController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/administrativa/{path?}', [AdminController::class, 'index'])->where('path', '.*')->middleware(['auth'])->name('admin');
