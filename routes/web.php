<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/productCategory/{id?}', [ProductController::class, 'viewProduct'])->name('viewProduct');
    Route::get('/create',[ProductController::class, 'create'])->name('create');
    Route::post('/store',[ProductController::class, 'store'])->name('store');
    Route::get('/manage-product',[ProductController::class, 'manage'])->name('manage');
    Route::get('/manage-product/search',[ProductController::class, 'manageByName'])->name('manageByName');
    Route::get('/edit/{product}',[ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{product}',[ProductController::class, 'update'])->name('update');
    Route::delete('/destroy/{product}',[ProductController::class, 'destroy'])->name('destroy');
});
