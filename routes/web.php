<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "students"], function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::post('/', [StudentController::class, 'store']);
    Route::get('create', [StudentController::class, 'create']);
    Route::get('{id}', [StudentController::class, 'show']);
    Route::get('{id}/edit', [StudentController::class, 'edit']);
    Route::patch('{id}/edit', [StudentController::class, 'update']);
    Route::delete('remove/{id}', [StudentController::class, 'destroy']);
});

Route::get('/', function () {
    return view('layout');
});
