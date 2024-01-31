<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, "login"]);
});


Route::group([
    'prefix' => 'contacts',
    'middleware' => 'auth:sanctum'
], function ($router) {
    Route::post('/', [ContactController::class, "create"]);
    Route::get('/', [ContactController::class, "list"]);
    Route::get('/{id}', [ContactController::class, "getById"]);
    Route::post('/{id}/edit', [ContactController::class, "update"]);

});


