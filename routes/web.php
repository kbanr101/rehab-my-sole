<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/blog/{slug}', [HomeController::class, 'blogDetails'])->name('blog.details');


Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//store contact details
Route::post('/contact', [ContactController::class, 'store'])->name('contact_submit');


Route::middleware(['auth', 'admin'])->group(function () {
    //admincontroller
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/change_password', [AdminController::class, 'password'])->name('password');

    Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('password.update');
    //contactcontroller
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact');


    // postcontroller
    Route::get('/admin/post_list', [PostController::class, 'index'])->name('post_list');
    Route::get('/admin/post_create', [PostController::class, 'create'])->name('post_create');
    Route::post('/admin/post_create', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/admin/post_delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/admin/post_update', [PostController::class, 'update'])->name('posts.update');
    Route::get('/admin/{slug}', [PostController::class, 'edit'])->name('posts.edit');
});

Route::get('about-us', [HomeController::class, 'aboutus'])->name('aboutusPage');
Route::get('blog-list', [HomeController::class, 'blogList'])->name('blogListPage');
Route::get('blog-detail/{slug}', [HomeController::class, 'blogDetailPage'])->name('blogDetailPage');
Route::get('coming-soon', [HomeController::class, 'comingSoon'])->name('comingSoonPage');
