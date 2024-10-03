<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])
    ->name('home');;

Route::resource('products', ProductController::class);
Route::resource('comments', CommentController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});

Auth::routes();

Route::prefix('comments')
    ->name('comments.')
    ->middleware(['auth', 'admin'])->group(function () {
        Route::post('{id}/approve', [CommentController::class, 'approveComment'])->name('approve');
        Route::post('{id}/deny', [CommentController::class, 'denyComment'])->name('deny');
});
