<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

// use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\PostController;

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

    // Route::resource('category', CategoryController::class)->except([
    // 'index', 'show'
    // ]);;
    //
    Route::resource('comment', CommentController::class)->except([
    'index', 'create', 'show', 'edit'
    ]);;

    Route::resource('post', PostController::class)->except([
    'index', 'show'
    ]);

});
