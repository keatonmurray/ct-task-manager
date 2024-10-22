<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;


Route::get('/', [TasksController::class, 'index'])->name('home');