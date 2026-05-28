<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyPageController;
use App\Http\Controllers\JobPageController;
use App\Http\Controllers\DocumentPageController;
use App\Http\Controllers\NewsPageController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;

Route::get('/', function () {

    return view('home');

});

Route::get('/jobs',[JobPageController::class,'index']);
Route::get('/news',[NewsPageController::class,'index']);
Route::get('/policies',[PolicyPageController::class,'index']);
Route::get('/documents', [DocumentPageController::class,'index']);



//admin
Route::get(
    '/admin',
    [DashboardController::class,'index']
);

Route::prefix('admin')->group(function () {

    Route::get(
        '/jobs',
        [JobController::class,'index']
    );
    Route::post(
        '/jobs',
        [JobController::class,'store']
    );

    // CREATE FORM
    Route::get(
        '/jobs/create',
        [JobController::class,'create']
    );
    // STORE JOB
    Route::post(
        '/jobs',
        [JobController::class,'store']
    );
    // EDIT FORM
    Route::get(
        '/jobs/{id}/edit',
        [JobController::class,'edit']
    );
    // UPDATE JOB
    Route::put(
        '/jobs/{id}',
        [JobController::class,'update']
    );
    // DELETE JOB
    Route::delete(
        '/jobs/{id}',
        [JobController::class,'destroy']
    );
    Route::get(
    '/news',
        [NewsController::class,'index']
    );

    Route::get(
    '/news/create',
        [NewsController::class,'create']
    );

    Route::post(
        '/news',
        [NewsController::class,'store']
    );

    Route::get(
        '/news/{id}/edit',
        [NewsController::class,'edit']
    );

    Route::put(
        '/news/{id}',
        [NewsController::class,'update']
    );

    Route::delete(
        '/news/{id}',
        [NewsController::class,'destroy']
    );
});

