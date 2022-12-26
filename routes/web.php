<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartItemController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homePage', [ProductController::class, 'viewProduct'])->name('homePage');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/registerAdmin', [UserController::class, 'registerAdmin'])->name('registerAdmin');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('store-form', [UserController::class, 'userRegistration']);
Route::post('store-form-admin', [UserController::class, 'adminRegistration']);
Route::post('checkLogIn', [UserController::class, 'userLogIn']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(
    function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    }
);

Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/productCategory/{id?}', [ProductController::class, 'viewProduct'])->name('viewProduct');
    Route::get('/productDetail/{id?}', [ProductController::class, 'viewProductDetail'])->name('viewProductDetail');
    Route::post('/purchase/{id}', [ProductController::class, 'purchase'])->name('purchase');

    Route::middleware(['auth', 'admin'])->group(
        function () {
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/manage-product', [ProductController::class, 'manage'])->name('manage');
            Route::get('/manage-product/search', [ProductController::class, 'manageByName'])->name('manageByName');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
            Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
            Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
        }
    );
});

Route::prefix('/transactions')->name('transactions.')->group(function () {
    Route::get('purchase', [TransactionController::class, 'purchase'])->name('purchase');
    Route::get('history', [TransactionController::class, 'showHistory'])->name('history');
});

Route::prefix('/cart')->name('cartItem.')->group(function () {
    Route::get('/', [CartItemController::class, 'index'])->name('index');
    Route::post('/add-to-cart/{id}', [CartItemController::class, 'addToCart'])->name('addToCart');
    Route::delete('/destroy/{cartItem}', [CartItemController::class, 'destroy'])->name('destroy');
});
