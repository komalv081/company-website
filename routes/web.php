<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyPageController;
use App\Http\Controllers\JobPageController;
use App\Http\Controllers\DocumentPageController;
use App\Http\Controllers\NewsPageController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AIChatController;
use App\Http\Controllers\Admin\KnowledgeBaseController;
use App\Models\ChatMessage;

Route::get('/', function () { return view('home');});

Route::get('/jobs',[JobPageController::class,'index']);
Route::get('/news',[NewsPageController::class,'index']);
Route::get('/news/{slug}', [NewsPageController::class, 'show'])
    ->name('news.show');
Route::get('/policies',[PolicyPageController::class,'index']);
Route::get('/documents', [DocumentPageController::class,'index']);

Route::get('/login', function () {  return redirect('/admin/login');})->name('login');
// LOGIN ROUTES

Route::get('/admin/login',  [AuthController::class,'showLogin'])->name('admin.login');

Route::post( '/admin/login', [AuthController::class,'login']);

Route::post( '/admin/logout',  [AuthController::class,'logout']);


// PROTECTED ADMIN ROUTES

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {

        Route::get('/',[DashboardController::class,'index']);

        // Jobs

        Route::get('/jobs',[JobController::class,'index']);
        Route::get('/jobs/create',[JobController::class,'create']);
        Route::post('/jobs',[JobController::class,'store']);
        Route::get('/jobs/{id}/edit',[JobController::class,'edit']);
        Route::put('/jobs/{id}',[JobController::class,'update']);
        Route::delete('/jobs/{id}',[JobController::class,'destroy']);

        // News

        Route::get('/news',[NewsController::class,'index']);
        Route::get('/news/create',[NewsController::class,'create']);
        Route::post('/news',[NewsController::class,'store']);
        Route::get('/news/{id}/edit',[NewsController::class,'edit']);
        Route::put('/news/{id}',[NewsController::class,'update']);
        Route::delete('/news/{id}',[NewsController::class,'destroy']);

        // Documents

        Route::get('/documents',[DocumentController::class,'index']);
        Route::get('/documents/create',[DocumentController::class,'create']);
        Route::post('/documents',[DocumentController::class,'store']);
        Route::get('/documents/{id}/edit',[DocumentController::class,'edit']);
        Route::put('/documents/{id}',[DocumentController::class,'update']);
        Route::delete('/documents/{id}',[DocumentController::class,'destroy']);

        // Policies

        Route::get('/policies',[PolicyController::class,'index']);
        Route::get('/policies/create',[PolicyController::class,'create']);
        Route::post('/policies',[PolicyController::class,'store']);
        Route::get('/policies/{id}/edit',[PolicyController::class,'edit']);
        Route::put('/policies/{id}',[PolicyController::class,'update']);
        Route::delete('/policies/{id}',[PolicyController::class,'destroy']);

        // Knowledge Base
        Route::get('/knowledge-base',[KnowledgeBaseController::class,'index']);
        Route::get('/knowledge-base/create',[KnowledgeBaseController::class,'create']);
        Route::post('/knowledge-base',[KnowledgeBaseController::class,'store']);

});

// AI Chat Routes
Route::get('/ai-chat', [AIChatController::class, 'index']);

Route::post('/clear-chat', function () {

    ChatMessage::truncate();

    return redirect('/ai-chat');

});
Route::post('/ai-chat/send', [AIChatController::class, 'sendMessage']);
