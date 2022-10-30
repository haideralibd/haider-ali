<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(
    [
        'middleware'  => ['auth', 'admin'],
        'prefix' => 'admin',
    ],
    function () {
        Route::get('/products/manage', [ProductController::class, 'index'])->name('products.manage');
        Route::post('/products/manage/store', [ProductController::class, 'store'])->name('products.manage.store');
        Route::post('/products/manage/delete/{productId}', [ProductController::class, 'destroy'])->name('products.manage.delete');
        Route::get('/product/list', [ProductController::class, 'showProductList'])->name('product.list');

        Route::get('/products/category/filter/{categoryId}', [ProductController::class, 'getFilteredByCategory'])->name('products.category.filter');
        Route::post('/products/search', [ProductController::class, 'searchProduct'])->name('products.search');
    }
);