<?php

use App\Http\Controllers\AdminController;
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
Route::get('/product', [ProductController::class, 'product']);


// product category
Route::get('/productcategory', [ProductCategoryController::class, 'productCategory']);
Route::post('/productcategory/add', [ProductCategoryController::class, 'addProductCategory']);

