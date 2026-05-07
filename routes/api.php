<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/activities', [ActivityController::class, 'index'])->middleware('auth:sanctum');
Route::get('/activity/{activity}', [ActivityController::class, 'show'])->middleware('auth:sanctum')->can('view', 'activity');
Route::delete('/activity/{activity}', [ActivityController::class, 'destroy'])->middleware('auth:sanctum')->can('delete', 'activity');

Route::get('/tags', [TagController::class, 'index'])->middleware('auth:sanctum');
Route::get('/tags/{id}', [TagController::class, 'show']);
