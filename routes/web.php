<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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
//     return view('welcome');f
// });

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registration',[AuthController::class, 'registration'])->name('registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'userLogin'])->name('user.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/checkout/{productID}', [UserController::class, 'checkout'])->name('checkout');
});

//Admin Routes
Route::middleware('auth')->group(function(){
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/users', [AdminController::class, 'users'])->name('users.all')->middleware('auth');
});

// Product Routes
Route::middleware('auth')->group(function(){
    Route::get('/product', [ProductController::class, 'addProduct'])->name('product.add');
    Route::post('/product/create', [ProductController::class, 'createProduct'])->name('product.create');
    Route::get('/product/edit/{productID}', [ProductController::class, 'editProduct'])->name('product.edit');
    Route::put('/product/update/{productID}', [ProductController::class, 'updateProduct'])->name('product.update');
    Route::delete('/product/delete/{productID}', [ProductController::class, 'deleteProduct'])->name('product.delete');
    Route::get('/products', [ProductController::class, 'getAllProducts'])->name('product.all');
});

// Cart Route
Route::get("/cart/{productID}", [CartController::class, 'createCart'])->name('cart');




































// 1. Delete Product Image
// 2. CART CRUD
// 3. Order CRUD
// 4. Payment
