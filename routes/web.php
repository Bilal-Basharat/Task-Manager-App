<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('projects', controller: ProjectController::class)->only(['index', 'create', 'store']);
Route::resource('tasks', TaskController::class)->except(['show']);
