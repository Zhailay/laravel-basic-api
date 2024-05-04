<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoansController;

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

Route::get('loans',[LoansController::class, 'index']);
Route::post('loans',[LoansController::class, 'store']);
Route::get('loans/{id}',[LoansController::class, 'show']);
Route::put('loans/{id}',[LoansController::class, 'update']);
Route::delete('loans/{id}',[LoansController::class, 'destroy']);

