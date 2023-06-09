<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoryController;
use App\Models\Likes;

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
Route::post('/login', [UserController::class, 'authenticate'])->name('login');

Route::post('/user/add-friend-request', [FriendController::class, 'store']);
Route::post('/user/cancel-friend-request', [FriendController::class, 'destroy']);

Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/profile/{user_id}', [UserController::class, 'show'])->middleware('auth');
Route::put('/profile/changeProfilePic', [UserController::class, 'updateProfilePic']);
Route::put('/profile/updateAccount', [UserController::class, 'updateAccount']);
Route::put('/profile/updateBio', [UserController::class, 'updateBio']);
Route::get('/settings/edit', [UserController::class, 'settings'])->middleware('auth');

Route::post('/posts/create', [PostController::class, 'store'])->middleware('auth');
Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');
Route::put('/posts/update', [PostController::class, 'update']);
Route::post('/posts/share', [PostController::class, 'share']);

Route::post('/like/{post}', [LikeController::class, 'store'])->name('post.like');
Route::post('/unlike/{post}', [LikeController::class, 'destroy'])->name('post.unlike');
Route::get('/getLikes/{post}', [LikeController::class, 'show'])->name('getLikes');

Route::post('/comment/{post_id}', [CommentController::class, 'store'])->name('post.comment');

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/story/create', [StoryController::class, 'index']);
Route::post('/story/create', [StoryController::class, 'create']);
Route::get('/story/show/{id}', [StoryController::class, 'show']);

Route::get('search', [SearchController::class, 'search']);
Route::get('search-page', [SearchController::class, 'index'])->name('search.page');

Route::get('/test', function() {
    return view('test');
});
