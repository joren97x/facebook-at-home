<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;

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

// RESOURCE ROUTES
// index - show all
// show - show single
// create - show form to create new
// store - store new
// edit - show form to edit
// update - update
// destroy - destroy


Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate'])->name('login');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/profile/{user_id}', [UserController::class, 'show'])->middleware('auth');
Route::put('/profile/changeProfilePic', [UserController::class, 'updateProfilePic']);
Route::put('/profile/updateAccount', [UserController::class, 'updateAccount']);
Route::get('/settings', [UserController::class, 'settings'])->middleware('auth');

Route::post('/posts/create', [PostController::class, 'store'])->middleware('auth');
Route::get('/', [PostController::class, 'index'])->middleware('auth');
Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');
Route::put('/posts/update', [PostController::class, 'update']);

Route::post('/like/{post}', [LikeController::class, 'store'])->name('post.like');
Route::post('/unlike/{post}', [LikeController::class, 'destroy'])->name('post.unlike');
Route::post('/comment/{post_id}', [CommentController::class, 'store'])->name('post.comment');

Route::get('search', [SearchController::class, 'search']);

Route::get('/test', function() {
    return view('test');
});
