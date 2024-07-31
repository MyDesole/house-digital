<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/catalog/{paginate?}', [ItemController::class, 'index']);
Route::post('/catalog', [ItemController::class, 'filter']);
Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store']);
