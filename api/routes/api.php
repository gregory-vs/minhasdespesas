<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DespesaController;

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

Route::get('/despesas', [DespesaController::class, 'index']);
Route::get('/despesas/{id}', [DespesaController::class, 'show']);
Route::post('/despesas', [DespesaController::class, 'store']);
Route::put('/despesas/{id}', [DespesaController::class, 'update']);
Route::delete('/despesas/{id}', [DespesaController::class, 'destroy']);
