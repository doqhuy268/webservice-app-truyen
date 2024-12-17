<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// [API yêu cầu xác thực (user đã đăng nhập)]
Route::middleware('auth:sanctum')->group(function () {
    // API User
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);

    // API Favourite
    Route::get('/users/favourites', [FavouriteController::class, 'index']); // Lấy danh sách yêu thích của người dùng
    Route::post('/stories/{storyId}/favourite', [FavouriteController::class, 'toggleFavourite']); // Thêm/xóa yêu thích truyện

    // API History
    Route::get('/users/reading-history', [HistoryController::class, 'getReadingHistory']); // Lấy lịch sử đọc của người dùng
    Route::post('/stories/{storyId}/chapters/{chapterId}/track', [HistoryController::class, 'trackChapter']); // Theo dõi chương đã đọc
});

// [API yêu cầu quyền admin]
Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
    // API User
    Route::get('/users', [UserController::class, 'index']);     // Lấy danh sách người dùng
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Xóa người dùng

    // API Category
    Route::post('/categories', [CategoryController::class, 'store']); // Tạo mới danh mục
    Route::put('/categories/{id}', [CategoryController::class, 'update']); // Cập nhật danh mục
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // Xóa danh mục

    // API Author
    Route::post('/authors', [AuthorController::class, 'store']); // Tạo mới tác giả
    Route::put('/authors/{id}', [AuthorController::class, 'update']); // Cập nhật thông tin tác giả
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']); // Xóa tác giả

    // API Story
    Route::post('/stories', [StoryController::class, 'store']); // Tạo mới truyện
    Route::put('/stories/{id}', [StoryController::class, 'update']); // Cập nhật thông tin truyện
    Route::delete('/stories/{id}', [StoryController::class, 'destroy']); // Xóa truyện

    // API Chapter
    Route::put('/chapters/{id}', [ChapterController::class, 'update']); // Cập nhật chương
    Route::delete('/chapters/{id}', [ChapterController::class, 'destroy']); // Xóa chương

    // API Comment
    Route::put('/comments/{id}', [CommentController::class, 'update']); // Cập nhật bình luận
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']); // Xóa bình luận
});

// [API không yêu cầu xác thực]
// API User
Route::post('/login', [AuthController::class, 'login']); // Đăng nhập
Route::post('/register', [AuthController::class, 'register']); // Đăng ký

// API Search
Route::get('/search', [SearchController::class, 'search']); // Tìm kiếm truyện

// API Category
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']); // Lấy danh sách danh mục
    Route::get('/{id}', [CategoryController::class, 'show']); // Lấy thông tin chi tiết danh mục
});

// API Author
Route::prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index']); // Lấy danh sách tác giả
    Route::get('/{id}', [AuthorController::class, 'show']); // Lấy thông tin chi tiết tác giả
});

// API Story
Route::prefix('stories')->group(function () {
    Route::get('/', [StoryController::class, 'index']); // Lấy danh sách truyện (có filter, pagination)
    Route::get('{id}', [StoryController::class, 'show']); // Lấy thông tin chi tiết truyện
    Route::get('trending', [StoryController::class, 'getTrending']); // Lấy danh sách truyện trending
    Route::post('{id}/like', [StoryController::class, 'toggleLike']); // Thích/bỏ thích truyện
});

// API Chapter
Route::prefix('chapters')->group(function () {
    Route::get('{id}', [ChapterController::class, 'show']); // Lấy thông tin chi tiết chương
});

// API Comment
Route::prefix('stories/{storyId}/comments')->group(function () {
    Route::get('/', [CommentController::class, 'index']); // Lấy danh sách bình luận của truyện
    Route::post('/', [CommentController::class, 'store']); // Thêm bình luận mới
});