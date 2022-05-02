<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
})->name('home');
Route::middleware(['auth'])->group(function () {
  Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
  Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});
Route::get('/register', [RegisterController::class, 'index'])->name('registration.index');
Route::post('/register', [RegisterController::class, 'register'])->name('registration.create');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/animals/new', [AnimalController::class, 'create'])->name('animal.create');
Route::post('/animals', [AnimalController::class, 'store'])->name('animal.store');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/new', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('/posts/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('/posts/{id}/delete', [PostController::class, 'delete'])->name('post.delete');
Route::post('/posts/{id}/delete', [PostController::class, 'remove'])->name('post.remove');

Route::post('/posts/{post_id}/comments', [CommentController::class, 'store'])->name('comment.store');
Route::get('/posts/{post_id}/comments/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('/posts/{post_id}/comments/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::post('/posts/{post_id}/comments/{id}/delete', [CommentController::class, 'delete'])->name('comment.delete');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorite.index');
Route::post('/posts/{post_id}/favorites', [FavoriteController::class, 'store'])->name('favorite.store');
Route::post('/posts/{post_id}/favorites/delete', [FavoriteController::class, 'delete'])->name('favorite.delete');

if (env('APP_ENV') !== 'local') {
  URL::forceScheme('https');
}
