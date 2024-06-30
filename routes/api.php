<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Locale\LocaleController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\SubCategory\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('products')->name('products-')->group(function () {
        Route::post('', [ProductController::class, 'store'])->name('store')->withoutMiddleware('auth:sanctum');
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('{product}', [ProductController::class, 'show'])->whereNumber('product')->name('show')->withoutMiddleware('auth:sanctum');
        Route::post('find', [ProductController::class, 'find'])->name('find')->withoutMiddleware('auth:sanctum');
    });

    Route::prefix('category')->name('category-')->group(function () {
        Route::post('', [CategoryController::class, 'store'])->name('store')->withoutMiddleware('auth:sanctum');
        Route::get('main', [CategoryController::class, 'main'])->name('main')->withoutMiddleware('auth:sanctum');
        Route::get('{category}', [CategoryController::class, 'show'])->whereNumber('category')->name('show')->withoutMiddleware('auth:sanctum');;
        Route::get('menu', [CategoryController::class, 'menu'])->name('menu')->withoutMiddleware('auth:sanctum');
        Route::get('products', [CategoryController::class, 'products'])->name('products')->withoutMiddleware('auth:sanctum');
    });

    Route::prefix('sub-category')->name('sub-category-')->group(function () {
        Route::post('', [SubCategoryController::class, 'store'])->name('store');
        Route::get('{subCategory}', [SubCategoryController::class, 'products'])->whereNumber('subCategory')->name('products')->withoutMiddleware('auth:sanctum');
    });

    Route::prefix('locale')->name('locale-')->group(function () {
        Route::post('', [LocaleController::class, 'setLocaleLanguage'])->name('store')->withoutMiddleware('auth:sanctum');
    });
});


