<?php

use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//show tasks
Route::get('/tasks', [TaskListController::class, 'index'])->name('tasks.index');

//add tasks
Route::get('/tasks/add', [TaskListController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskListController::class, 'store'])->name('tasks.store');

//delete tasks

Route::delete('/tasks/delete/{id}', [TaskListController::class, 'destroy'])->name('tasks.delete');

//update show
Route::get('student/{id}', [TaskListController::class, 'show'])->name('tasks.show');
Route::get('tasks/edit/{id}', [TaskListController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskListController::class, 'update'])->name('tasks.update');

