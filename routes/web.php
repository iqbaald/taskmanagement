<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function() {
    Route::get('/todo',[TodoController::class,'index'])->name('todo');
    Route::post('/todo',[TodoController::class,'store'])->name('todo.post');
    Route::put('/todo/{id}',[TodoController::class,'update'])->name('todo.update');
    Route::delete('/todo/{id}',[TodoController::class,'destroy'])->name('todo.delete');
    Route::get('/todo/{role}', [TodoController::class, 'showTasksByRole'])->name('todo.role');
    Route::post('/todo/{role}', [TodoController::class, 'storeWithRole'])->name('todo.role.post');
});

Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
