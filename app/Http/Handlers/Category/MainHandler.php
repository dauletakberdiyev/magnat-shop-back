<?php

namespace App\Http\Handlers\Category;

use App\Http\Contracts\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Services\Cache\CacheService;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class MainHandler
{
    private CategoryRepositoryInterface $categoryRepository;

    private CacheService $cacheService;

    public function __construct(CategoryRepositoryInterface $categoryRepository, CacheService $cacheService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->cacheService = $cacheService;
    }

    public function handle(bool $caching = false, int $count = 15): LengthAwarePaginator
    {
        if ($caching) {
            return $this->cacheService->remember(
                'categories',
                function () use ($count) {
                    return $this->categoryRepository->all()->paginate($count);
                }
            );
        }

        return $this->categoryRepository->all()->paginate($count);
    }
}
