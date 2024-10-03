<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Locale\LocaleController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Questionnaire\QuestionnaireController;
use App\Http\Controllers\QuestionnaireDetails\QuestionnaireDetailsController;
use App\Http\Controllers\SubCategory\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('products')->name('products-')->group(function () {
        Route::post('', [ProductController::class, 'store'])->name('store');
        Route::get('', [ProductController::class, 'index'])->name('index')->withoutMiddleware('auth:sanctum');
        Route::get('{product}', [ProductController::class, 'show'])->whereNumber('product')->name('show')->withoutMiddleware('auth:sanctum');
        Route::post('find', [ProductController::class, 'find'])->name('find');
        Route::put('{product}/is-exist', [ProductController::class, 'updateIsExist'])->name('update');
        Route::put('{product}/remove-discount', [ProductController::class, 'removeDiscount'])->name('remove-discount');
        Route::delete('{product}', [ProductController::class, 'destroy'])->name('destroy');
        Route::put('{product}', [ProductController::class, 'update'])->name('update');
    });

    Route::prefix('category')->name('category-')->group(function () {
        Route::post('', [CategoryController::class, 'store'])->name('store');
        Route::get('main', [CategoryController::class, 'main'])->name('main');
        Route::get('{category}', [CategoryController::class, 'show'])->whereNumber('category')->name('show');
        Route::get('menu', [CategoryController::class, 'menu'])->name('menu');
        Route::get('products', [CategoryController::class, 'products'])->name('products');
        Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::post('{category}', [CategoryController::class, 'update'])->name('update');
        Route::post('{category}/add-subcategory', [CategoryController::class, 'addSubCategory'])->name('addSubCategory');
    });

    Route::prefix('sub-category')->name('sub-category-')->group(function () {
        Route::post('', [SubCategoryController::class, 'store'])->name('store');
        Route::get('{subCategory}', [SubCategoryController::class, 'products'])->whereNumber('subCategory')->name('products');
    });

    Route::prefix('questionnaires')->name('questionnaires-')->group(function () {
        Route::post('', [QuestionnaireController::class, 'create'])->name('create')->withoutMiddleware('auth:sanctum');
        Route::put('{questionnaire}', [QuestionnaireController::class, 'update'])->name('update')->withoutMiddleware('auth:sanctum');
        Route::delete('{questionnaire}', [QuestionnaireController::class, 'destroy'])->name('destroy')->withoutMiddleware('auth:sanctum');
        Route::get('', [QuestionnaireController::class, 'index'])->name('index')->withoutMiddleware('auth:sanctum');

        Route::prefix('{questionnaire}/details')->name('details-')->group(function () {
            Route::post('', [QuestionnaireDetailsController::class, 'create'])->name('create')->withoutMiddleware('auth:sanctum');
            Route::get('', [QuestionnaireDetailsController::class, 'index'])->name('index')->withoutMiddleware('auth:sanctum');
            Route::post('update', [QuestionnaireDetailsController::class, 'update'])->name('index')->withoutMiddleware('auth:sanctum');
        });
    });

    Route::prefix('locale')->name('locale-')->group(function () {
        Route::post('', [LocaleController::class, 'setLocaleLanguage'])->name('store');
    });
});
