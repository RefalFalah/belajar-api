<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\OrangTuaController;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('biodatas', BiodataController::class);
// Route::apiResource('keluargas', AnakController::class);
Route::apiResource('keluargas', OrangTuaController::class);

