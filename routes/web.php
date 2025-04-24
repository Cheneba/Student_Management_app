<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "students"], function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::post('/', [StudentController::class, 'store']);
    Route::get('create', [StudentController::class, 'create']);
    Route::get('{id}', [StudentController::class, 'show']);
    Route::get('{id}/edit', [StudentController::class, 'edit']);
    Route::post('{id}/edit', [StudentController::class, 'update']);
    Route::post('remove/{id}', [StudentController::class, 'delete']);
});

Route::get('/', function () {
    return view('layout');
});
