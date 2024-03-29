<?php

use App\Http\Controllers\API\CategoriasFiltro;
use App\Http\Controllers\API\ContribuidorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NoticiaController;
use App\Http\Controllers\API\FormProjetoController;
use App\Http\Controllers\API\UserSearchController;
use App\Http\Controllers\API\MembroController;
use App\Http\Controllers\API\ProjetoController;
use App\Http\Controllers\API\SolicitacaoController;
use App\Models\Contribuidor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::apiResource('noticias', NoticiaController::class)->only(['index','destroy','store', 'update']);
        Route::apiResource('membros', MembroController::class)->only(['index','destroy', 'update']);
        Route::apiResource('projeto', ProjetoController::class)->only(['index', 'show', 'destroy', 'update']);
        Route::apiResource('solicitacao', SolicitacaoController::class);
    });

    Route::get('/search/{nome}/{tipo}', [UserSearchController::class, 'show']);
    Route::resource('projetos', FormProjetoController::class)
        ->only(['index', 'store'])
        ->middleware(['userStatus']);
});

Route::get('categoria/filter/{slug}', [CategoriasFiltro::class, 'index']);
Route::get('categoria/filter/{slug}/{section}/{paginate}', [CategoriasFiltro::class, 'show']);
Route::get('contribuidores', [ContribuidorController::class, 'index']);
