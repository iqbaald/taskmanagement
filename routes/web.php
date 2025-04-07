<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Todo\AdminTodoController;
use App\Http\Controllers\Todo\UserTodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function() {
    Route::get('/todo',[UserTodoController::class,'index'])->name('todo');
    Route::put('/todo/{id}',[UserTodoController::class,'update'])->name('todo.update');
    
    // Admin Route
    Route::get('/todo/{user_id}', [AdminTodoController::class, 'showTasksByRole'])->name('admin.todo.role');
    Route::put('/todo/{id}/up',[AdminTodoController::class,'updateAdmin'])->name('admin.todo.update');
    Route::delete('/todo/{id}',[AdminTodoController::class,'destroy'])->name('admin.todo.delete');
    Route::post('/todo/{user_id}', [AdminTodoController::class, 'storeWithRole'])->name('admin.todo.userId.post');
});

Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
