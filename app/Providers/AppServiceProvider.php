<?php

namespace App\Providers;

use App\Http\Contracts\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Contracts\Repositories\Products\ProductRepositoryInterface;
use App\Http\Repositories\Category\CategoryRepository;
use App\Http\Repositories\Products\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
