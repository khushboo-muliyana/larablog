<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Only writers can create posts
Route::get('/posts/create', [PostController::class, 'create'])
     ->middleware(['auth', 'writer']);

// Only admins can manage users
Route::get('/admin/users', [UserController::class, 'index'])
     ->middleware(['auth', 'admin']);
     
require __DIR__.'/auth.php';
