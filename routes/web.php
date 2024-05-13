<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::delete('/posts/trashed/{post}', [PostController::class, 'trashedDestroy'])->name('posts.trashedDestroy');
Route::post('/posts/trashed/{post}', [PostController::class, 'trashedRestore'])->name('posts.trashedRestore');
