<?php

namespace App\Http\Handlers\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final readonly class MenuHandler
{
    public function handle(): Collection
    {
        $categories = Category::query()
            ->with([
                'subCategories.products',
            ])
            ->get();

        return $categories;
    }
}
