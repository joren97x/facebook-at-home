<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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



Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate'])->name('login');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/profile/{user_id}', [UserController::class, 'show']);
Route::put('/profile/changeProfilePic', [UserController::class, 'updateProfilePic']);
Route::get('/settings', [UserController::class, 'settings']);

Route::post('/posts/create', [PostController::class, 'store']);
Route::get('/', [PostController::class, 'index'])->middleware('auth');

Route::post('/like/{post_id}', [LikeController::class, 'like']);
Route::post('/comment/{post_id}', [CommentController::class, 'store']);

Route::get('/test', function() {
    return view('test');
});
