<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blogs\Frontend\BlogPostController;

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

Auth::routes();

Route::get('/', [BlogPostController::class, 'index'])->name('blogs.posts.index');
Route::get('/posts/{slug}', [BlogPostController::class, 'show'])->name('blogs.posts.single');
