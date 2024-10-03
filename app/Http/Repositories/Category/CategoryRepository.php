<?php

namespace App\Http\Repositories\Category;

use App\Http\Contracts\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

final class CategoryRepository implements CategoryRepositoryInterface
{
    private const LIMIT = 10;

    public function all(): Builder
    {
        return Category::query()
            ->with([
                'subCategories.products' => function ($query) {
                    $query->orderByDesc('created_at')
                        ->limit(self::LIMIT);
                },
            ]);
    }
}
