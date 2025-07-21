<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Post routes
    Route::prefix('posts')->group(function () {
        Route::get('/create', [PostController::class, 'create'])
             ->middleware('writer')
             ->name('posts.create'); // Added route name
        
        Route::post('/', [PostController::class, 'store'])
             ->middleware('writer')
             ->name('posts.store');
    });
});

// Admin routes
Route::get('/admin/users', [UserController::class, 'index'])
     ->middleware(['auth', 'admin']);

require __DIR__.'/auth.php';