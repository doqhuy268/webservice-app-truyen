<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Định nghĩa các route API mà không yêu cầu xác thực
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']); // Lấy danh sách thể loại
Route::post('/categories', [CategoryController::class, 'store']); // Thêm mới thể loại
Route::get('/categories/{id}', [CategoryController::class, 'show']); // Lấy chi tiết thể loại
Route::put('/categories/{id}', [CategoryController::class, 'update']); // Cập nhật thể loại
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // Xóa thể loại
