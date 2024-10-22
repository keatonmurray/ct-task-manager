<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;


Route::get('/', [TasksController::class, 'index'])->name('home');
Route::get('/create', [TasksController::class, 'create'])->name('add-task');
Route::post('/store', [TasksController::class, 'store'])->name('save-task');
Route::get('/show/{id}', [TasksController::class, 'show']);
Route::get('edit/{id}', [TasksController::class, 'edit']);
Route::put('/update/{id}', [TasksController::class, 'update']);
Route::post('/update-priority', [TasksController::class, 'updatePriority']);
Route::delete('/delete/{id}', [TasksController::class, 'destroy']);
