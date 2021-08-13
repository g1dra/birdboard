<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/token', function () {
    return response()->json(["token" => csrf_token()]);
});

Route::resource('projects', ProjectController::class);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store'])->middleware('auth');

