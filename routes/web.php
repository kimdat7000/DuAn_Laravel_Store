<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QvsAController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\apiProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/introduce', [IntroduceController::class, 'index'])->name('introduce');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog_detail', [BlogController::class, 'blog_detail'])->name('blog_detail');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/Q&A', [QvsAController::class, 'index'])->name('Q&A');

Route::middleware(['web'])->group(function () {
    Route::get('/product/category/{category_id}', [ProductController::class, 'productByCategory'])->name('product_by_category');
    Route::get('/product_detail/{id}', [ProductController::class, 'product_detail'])->name('product_detail');
});

Route::get('/search', [ProductController::class, 'searchProduct'])->name('search_product');

/* Account */

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');


Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

/* Admin */
Route::get('/admin', [AdminController::class, 'index'])->name('home');

Route::get('/product_admin', [AdminController::class, 'product'])->name('product_admin');
Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
Route::get('/products/{id}', [AdminController::class, 'editProduct'])->name('products.edit');
Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
Route::delete('/products/{id}', [AdminController::class, 'destroyProduct'])->name('products.destroy');

Route::get('/category_admin', [AdminController::class, 'category'])->name('category_admin');
Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
Route::get('/categories/{id}', [AdminController::class, 'editCategory'])->name('categories.edit');
Route::put('/categories/{id}', [AdminController::class, 'updateCategory'])->name('categories.update');
Route::delete('/categories/{id}', [AdminController::class, 'destroyCategory'])->name('categories.destroy');

Route::get('/user_admin', [AdminController::class, 'user'])->name('user_admin');
Route::post('/users/update-role', [AdminController::class, 'updateRole'])->name('users.updateRole');
Route::get('/users/lock/{id}', [AdminController::class, 'lockUser'])->name('lockUser');
Route::get('/users/unlock/{id}', [AdminController::class, 'unlockUser'])->name('unlockUser');



Route::get('/bill_admin', [AdminController::class, 'bill'])->name('bill_admin');
Route::get('/bill_admin_detail/{id}', [AdminController::class, 'bill_detail'])->name('bill_detail');
Route::put('/update-status/{id}', [AdminController::class, 'updateStatus'])->name('update_status');

Route::get('/comment_admin', [AdminController::class, 'comment'])->name('comment_admin');

Route::get('/download-products-pdf', [PDFController::class, 'downloadProductsPDF'])->name('download.products.pdf');


Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart_detail', [CartController::class, 'cart_detail'])->name('cart_detail');
Route::get('/history', [CartController::class, 'history'])->name('history');
Route::get('/history_detail/{id}', [CartController::class, 'history_detail'])->name('history_detail');
Route::get('/favorite', [CartController::class, 'favorite'])->name('favorite');


Route::post('/cart/add', [CartController::class, 'addTOCart'])->name('addToCart');
/* Route::post('/buyNow', [CartController::class, 'buyNow'])->name('buyNow');*/
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/history', [CartController::class, 'orderhistory'])->name('history');

Route::get('/latest-products', [ProductController::class, 'getLatestProducts']);

Route::get('/api/new-products', [apiProductController::class, 'products_lasted']);
Route::get('/api/best-sellers', [apiProductController::class, 'products_bestseller']);

Auth::routes();

//Cổng thanh toán
Route::post('/payment', [CartController::class, 'payment'])->name('payment');
Route::get('/payment/return', [CartController::class, 'paymentReturn'])->name('payment.return');
