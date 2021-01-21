<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\PostController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/posts/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/posts/{category}', [MainController::class, 'category'])->name('category');

Route::get('/posts/{category}/{id}', [MainController::class, 'post'])->name('post');

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function(){

    Route::resource('category', CategoryController::class)->except([
    'index', 'show'
    ]);

    Route::resource('comment', CommentController::class)->only([
    'store', 'update', 'destroy'
    ]);

    Route::resource('post', PostController::class)->except([
    'index', 'show'
    ]);

});
Route::group(['middleware' => 'auth'], function(){

  Route::get('/user-panel', [AdminController::class, 'user_panel'])->name('user_panel');

  Route::post('/user-panel/user-edit', [AdminController::class, 'user_edit'])->name('user_edit');

});
