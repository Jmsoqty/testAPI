<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrudsampleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('crudsample', [CrudsampleController::class, 'index']);
Route::post('crudsample', [CrudsampleController::class, 'add']);
Route::get('crudsample/{id}', [CrudsampleController::class, 'view']);
Route::put('crudsample/{id}/update', [CrudsampleController::class, 'update']);
Route::delete('crudsample/{id}/delete', [CrudsampleController::class, 'destroy']);