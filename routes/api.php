<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GoodsController;
use App\Http\Controllers\Api\AuthController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('goods-list', [GoodsController::class, 'listing']);

Route::get('/profile', function(Request $request) {
    return auth()->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'goods', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [GoodsController::class, 'index']);
    Route::post('add', [GoodsController::class, 'store']);
    Route::get('edit/{id}', [GoodsController::class, 'show']);
    Route::post('update/{id}', [GoodsController::class, 'update']);
    Route::delete('delete/{id}', [GoodsController::class, 'destroy']);
});
