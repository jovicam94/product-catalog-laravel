<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('api.logout');

Route::get('/products', [ProductController::class, 'index'])->name('api.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show');

Route::post('/comments/{id}', [CommentController::class, 'store'])->name('api.comments.store');
Route::get('/products/{id}/comments', [CommentController::class, 'index'])->name('api.comments.index');

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/comments/{id}/approve', [CommentController::class, 'approveComment'])->name('api.comments.approve');
    Route::post('/comments/{id}/deny', [CommentController::class, 'denyComment'])->name('api.comments.deny');
});
