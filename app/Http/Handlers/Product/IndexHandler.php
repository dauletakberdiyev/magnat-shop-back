<?php

namespace App\Http\Handlers\Product;

use App\Http\Contracts\Repositories\Products\ProductRepositoryInterface;
use App\Http\Services\Cache\CacheService;
use Illuminate\Database\Eloquent\Collection;

final readonly class IndexHandler
{
    private ProductRepositoryInterface $productRepository;

    private CacheService $cacheService;

    public function __construct(ProductRepositoryInterface $productRepository, CacheService $cacheService)
    {
        $this->productRepository = $productRepository;
        $this->cacheService = $cacheService;
    }

    public function handle(bool $caching = false): Collection
    {
        if ($caching) {
            return $this->cacheService->remember(
                'products',
                function () {
                    return $this->productRepository->all()->get();
                }
            );
        }

        return $this->productRepository->all()->get();
    }
}
