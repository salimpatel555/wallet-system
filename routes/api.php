<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TransferController;
use App\Http\Controllers\API\WalletController;
use Illuminate\Support\Facades\Route;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/wallet',[WalletController::class,'wallet']);

    Route::post('/transfer',[TransferController::class,'transfer']);

});
