<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;


Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('admin', [MainController::class, 'index'])->name('admin');
        Route::get('admin/main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);


        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);

    });
});

Route::get('/', [\App\Http\Controllers\User\MainController::class, 'index']);
Route::post('/services/load-product', [\App\Http\Controllers\User\MainController::class, 'loadProduct']);

Route::get('/danh-muc/{id}-{slug}.html', [\App\Http\Controllers\User\MenuController::class, 'index']);
Route::get('/san-pham/{id}-{slug}.html', [\App\Http\Controllers\User\ProductController::class, 'index']);

#Cart
Route::post('add-cart', [\App\Http\Controllers\User\CartController::class, 'index']);
Route::get('carts', [\App\Http\Controllers\User\CartController::class, 'show']);
Route::post('update-cart', [\App\Http\Controllers\User\CartController::class, 'update']);
Route::get('carts/delete/{id}', [\App\Http\Controllers\User\CartController::class, 'remove']);
Route::post('carts', [\App\Http\Controllers\User\CartController::class, 'addCart']);
