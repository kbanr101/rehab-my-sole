<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
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
});
Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/post_list', [PostController::class, 'index'])->name('post_list');
    Route::get('/admin/post_create', [PostController::class, 'create'])->name('post_create');
    Route::post('/admin/post_create', [PostController::class, 'store'])->name('posts.store');
});
