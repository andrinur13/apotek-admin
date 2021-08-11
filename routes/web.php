<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
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

Route::get('/', [AdminController::class, 'index']);

// product

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('dashboard')->group(function () {
        Route::get('/product', [ProductController::class, 'product']);
        Route::post('/product/add', [ProductController::class, 'addProduct']);
        Route::post('/product/delete/{id}', [ProductController::class, 'deleteProduct']);


        // product category
        Route::get('/productcategory', [ProductCategoryController::class, 'productCategory']);
        Route::post('/productcategory/add', [ProductCategoryController::class, 'addProductCategory']);
        Route::get('/productcategory/delete/{id}', [ProductCategoryController::class, 'deleteProductCategory']);
        Route::get('/productcategory/get/{id}', [ProductCategoryController::class, 'getProductCategory']);
        Route::POST('/productcategory/edit', [ProductCategoryController::class, 'editProductCategory']);
    });
});
