<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\PolicyController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\AuthController;

Route::apiResource('news', NewsController::class);

Route::apiResource('policies', PolicyController::class);

Route::apiResource('documents', DocumentController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post(
    'register',
    [AuthController::class,'register']
);

Route::post(
    'login',
    [AuthController::class,'login']
);

Route::middleware(
    'auth:sanctum'
)->post(
    'logout',
    [AuthController::class,'logout']
);
Route::get(
    'jobs',
    [JobController::class,'index']
);

Route::middleware('auth:sanctum')
->group(function(){

    Route::post(
        'jobs',
        [JobController::class,'store']
    );

    Route::put(
        'jobs/{id}',
        [JobController::class,'update']
    );

    Route::delete(
        'jobs/{id}',
        [JobController::class,'destroy']
    );

});
