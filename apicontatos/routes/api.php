<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ContatoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//'Api\ContatoController@status';

Route::get('/teste', [ContatoController::class, 'status']);

Route::namespace('Api')->group( function() {

   Route::post('/contato/add', [ContatoController::class, 'add']);
   Route::get('/contatos', [ContatoController::class, 'list']);
   Route::get('/contato/{id}', [ContatoController::class, 'select']);
   Route::put('/contato/{id}', [ContatoController::class, 'update']);
   Route::delete('/contato/{id}', [ContatoController::class, 'delete']);

});