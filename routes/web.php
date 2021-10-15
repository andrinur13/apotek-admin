<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
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
        // product
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/product', [ProductController::class, 'product']);
        Route::post('/product/add', [ProductController::class, 'addProduct']);
        Route::post('/product/delete/{id}', [ProductController::class, 'deleteProduct']);
        Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct']);
        Route::post('/product/update/{id}', [ProductController::class, 'updateProduct']);

        // product category
        Route::get('/productcategory', [ProductCategoryController::class, 'productCategory']);
        Route::post('/productcategory/add', [ProductCategoryController::class, 'addProductCategory']);
        Route::post('/productcategory/delete/{id}', [ProductCategoryController::class, 'deleteProductCategory']);
        Route::get('/productcategory/get/{id}', [ProductCategoryController::class, 'getProductCategory']);
        Route::POST('/productcategory/edit', [ProductCategoryController::class, 'editProductCategory']);

        // product stock
        Route::get('/productstock', [ProductStockController::class, 'index']);
        Route::post('/productstock/add', [ProductStockController::class, 'store']);
        Route::post('/productstock/delete/{id}', [ProductStockController::class, 'delete']);

        // user
        Route::get('/user/role', [UserRoleController::class, 'index']);
        Route::post('/user/role/add', [UserRoleController::class, 'store']);
        Route::get('/user/role/detail/{id}', [UserRoleController::class, 'detail']);
        Route::post('/user/role/delete/{id}', [UserRoleController::class, 'delete']);
        Route::post('/user/role/update/{id}', [UserRoleController::class, 'update']);

        Route::get('/user/users', [UserController::class, 'index']);
        Route::post('/user/users/add', [UserController::class, 'store']);
        Route::get('/user/users/detail/{id}', [UserController::class, 'detail']);
        Route::post('/user/users/delete/{id}', [UserController::class, 'delete']);
        Route::post('/user/users/update/{id}', [UserController::class, 'update']);

        // invoice
        Route::get('/invoice', [InvoiceController::class, 'index']);
        Route::get('/invoice/detail/{id}', [InvoiceController::class, 'detail']);

    });
});
