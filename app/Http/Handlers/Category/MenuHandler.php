<?php

namespace App\Http\Handlers\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final readonly class MenuHandler
{
    public function handle(): Collection
    {
        return Category::query()
            ->with([
                'subCategories'
            ])
            ->get();
    }
}
