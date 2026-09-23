<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('blogsApi', BlogController::class)->only('index', 'show');
Route::apiResource('commentsApi', CommentController::class)->only('index');