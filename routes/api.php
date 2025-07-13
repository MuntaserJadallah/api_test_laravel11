<?php

use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/prodcts/index',[ProductsController::class,'index']);
Route::get('/prodcts/show/{id}',[ProductsController::class,'show']);
Route::post('/prodcts/store',[ProductsController::class,'store']);
Route::put('/prodcts/update/{id}',[ProductsController::class,'update']);
Route::delete('/prodcts/destroy/{id}',[ProductsController::class,'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
