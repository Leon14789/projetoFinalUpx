<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\questionController;
use App\Http\Controllers\Api\responseController;


Route::apiResources([
    'questions' => questionController::class,
]);

Route::post('/register', [authController::class, 'store']);

Route::post('/question', [questionController::class, 'store']);

Route::get('/listQuestion', [questionController::class, 'index']);

Route::post('/myQuestions/{id}', [questionController::class, 'myQuestions']);


Route::post('/response', [responseController::class, 'store']);

Route::post('listResponse/{question_id}', [responseController::class, 'index']);





Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
