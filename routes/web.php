<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;
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


Route::get('/admin', function () {
    return view('admin.login');
});

// Route::get('/admin', function () {
//     return view('admin.login');
// });
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.Postlogin');
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
    Route::delete('/admin/contact_delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');


    // category
    Route::resource('categories', CategoryController::class);
    // Route::resource('categories', CategoryController::class)->parameters([
    //     'categories' => 'category:slug', // Use slug as the parameter
    // ]);

    // slidercontroller
    Route::get('/admin/slider/slider_list', [SliderController::class, 'index'])->name('slider.list');
    Route::get('/admin/slider_create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/admin/slider_create', [SliderController::class, 'store'])->name('slider.store');
    Route::delete('/admin/slider_delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    Route::post('/admin/slider_update', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/admin/{id}', [SliderController::class, 'edit'])->name('slider.edit');

    // postcontroller


    Route::get('/admin/post/post_list', [PostController::class, 'index'])->name('post.list');
    Route::get('/admin/post/post_create', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/post/post_create', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/admin/post/post_delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/admin/post/post_update', [PostController::class, 'update'])->name('posts.update');
    Route::get('/admin/post/{slug}', [PostController::class, 'edit'])->name('posts.edit');
});



//fronted route start 

//userlogin controller start 



Route::get('/login', [UserLoginController::class, 'index'])->name('login');
//Route::get('/register', [UserLoginController::class, 'index'])->name('register');
Route::post('/login', [UserLoginController::class, 'login'])->name('login.submit');
Route::get('/', [HomeController::class, 'index']);


//Route::get('login', [HomeController::class, 'loginPages'])->name('loginPages');
Route::get('register', [UserLoginController::class, 'register'])->name('register');
Route::post('register', [UserLoginController::class, 'registerCreate'])->name('register.submit');

Route::get('verify_otp', [UserLoginController::class, 'otpView'])->name('verify_otp');
Route::post('verify_otp', [UserLoginController::class, 'VerifyOtp'])->name('verify_otp');
Route::post('resend_otp', [UserLoginController::class, 'resendOtp'])->name('resend_otp');


Route::get('forgot_otp', [UserLoginController::class, 'forgotOtp'])->name('forgot_otp');
Route::post('forgot_otp', [UserLoginController::class, 'forgotOtpSubmit'])->name('submit.forgot_otp');

Route::post('forgot_password', [UserLoginController::class, 'forgotPasswordSubmit'])->name('submit.forgot_password');


Route::get('change_password', [UserLoginController::class, 'changePassword'])->name('change_password');
Route::post('change_password', [UserLoginController::class, 'changePasswordSubmit'])->name('submit.password');


Route::get('forgot_password', [UserLoginController::class, 'forgotPassword'])->name('forgot_password');
Route::get('otp-verification', [HomeController::class, 'otpVerificationPages'])->name('otpVerificationPage');



Route::get('home', [HomeController::class, 'home']);
Route::get('/blog/{slug}', [HomeController::class, 'blogDetails'])->name('blog.details');





Route::get('about-us', [HomeController::class, 'aboutus'])->name('aboutusPage');
Route::get('blog-list', [HomeController::class, 'blogList'])->name('blogListPage');
Route::post('filter-results', [HomeController::class, 'ajaxBlog'])->name('filter-results');
Route::get('blog-detail/{slug}', [HomeController::class, 'blogDetails'])->name('blogDetailPage');
Route::get('coming-soon', [HomeController::class, 'comingSoon'])->name('comingSoonPage');
Route::post('/post/{id}/like', [HomeController::class, 'like']);

Route::get('/voice', function () {
    return view('voice');
});
