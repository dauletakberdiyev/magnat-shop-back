<?php

namespace App\Http\Handlers\Category;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class MainHandler
{
    public function handle(int $count = 15): LengthAwarePaginator
    {
        return Category::query()
            ->with([
                'subCategories.products' => function ($query) {
                    $query->orderByDesc('created_at')
                        ->limit(10);
                }
            ])
            ->paginate(2);
    }
}
