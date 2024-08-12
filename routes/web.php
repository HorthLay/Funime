<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get("/search", [Homecontroller::class, "search"]);


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/admin', [AdminController::class, 'index'])->middleware('checkUserType:admin');
Route::get('/user', [HomeController::class, 'index'])->middleware('checkUserType:user');


Route::get('/forgot-password', [ForgetPasswordManager::class, 'forgotPassword'])->name('forget.password');
Route::post('/forgot-password', [ForgetPasswordManager::class, 'forgotPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');
Auth::routes(['verify' => true]);
///Home


Route::get('/category/{name}', [Homecontroller::class, 'showByCategory'])->name('articles_by_category');
Route::get('/episodes', [Homecontroller::class, 'showEpisodes']);
Route::post('/articles/{article}/like', [LikeController::class, 'store'])->name('articles.like');
Route::post('/articles/{article}/comment', [CommentController::class, 'store'])->name('articles.comment');
Route::get('/episodes', [Homecontroller::class, 'showEpisodes']);
Route::get('/article_detail/{id}', [HomeController::class, 'article_detail'])->name('article_detail');
Route::get('articles/{article}', [ArticleController::class, 'show'])->middleware('trackArticleView');
Route::get('/episodes', [Homecontroller::class, 'showEpisodes']);
Route::get('/movie/{id}', [Homecontroller::class, 'movie'])->middleware(['auth', 'verified']);



//admin

Route::get('/add_article', [AdminController::class, 'create'])->middleware('checkUserType:admin');
Route::post('/upload', [AdminController::class, 'store'])->middleware('checkUserType:admin');

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware('checkUserType:admin');

Route::get("/category_view", [AdminController::class, "category_view"])->name('category_view')->middleware('checkUserType:admin');
Route::post("/category", [AdminController::class, "create_category"])->name('create_category')->middleware('checkUserType:admin');
Route::post('comments/{comment}/reply', [CommentController::class, 'reply'])->middleware('checkUserType:admin');
Route::get('/view_article', [AdminController::class, 'view_article'])->middleware('checkUserType:admin');
Route::get('/edit_article/{id}', [AdminController::class, 'edit_article'])->middleware('checkUserType:admin');
Route::get('/delete_article/{id}', [AdminController::class, 'delete_article'])->middleware('checkUserType:admin');
Route::get('/update_article/{id}', [AdminController::class, 'update_article'])->middleware('checkUserType:admin');
Route::post('/article_edit/{id}', [AdminController::class, 'article_edit'])->middleware('checkUserType:admin');

// Episode
Route::get('/articles/{article}/episodes', [AdminController::class, 'viewEpisodes'])->name('articles.episodes.view')->middleware('checkUserType:admin');
Route::get('/articles/{article}/episodes/create', [AdminController::class, 'createEpisode'])->name('articles.episodes.create')->middleware('checkUserType:admin');
Route::post('/articles/{article}/episodes', [AdminController::class, 'storeEpisode'])->name('articles.episodes.store')->middleware('checkUserType:admin');
Route::get('/articles/{article}/episodes/{episode}/edit', [AdminController::class, 'editEpisode'])->name('articles.episodes.edit')->middleware('checkUserType:admin');
Route::put('/articles/{article}/episodes/{episode}', [AdminController::class, 'updateEpisode'])->name('articles.episodes.update')->middleware('checkUserType:admin');
Route::delete('/articles/{article}/episodes/{episode}', [AdminController::class, 'deleteEpisode'])->name('articles.episodes.delete')->middleware('checkUserType:admin');
// User

Route::get('/add_user', [AdminController::class, 'add_user'])->middleware('checkUserType:admin');
Route::get('/update_user/{id}', [AdminController::class, 'update_user'])->middleware('checkUserType:admin');
Route::post('/edit_user/{id}', [AdminController::class, 'edit_user'])->middleware('checkUserType:admin');
Route::post('/upload_user', [AdminController::class, 'upload_user'])->middleware('checkUserType:admin');
Route::get('/view_user', [AdminController::class, 'view_user'])->middleware('checkUserType:admin');
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user'])->middleware('checkUserType:admin');
