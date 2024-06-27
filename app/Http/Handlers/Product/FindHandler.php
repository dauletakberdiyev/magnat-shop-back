<?php

namespace App\Http\Handlers\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

final readonly class FindHandler
{
    public function handle(string $search): Collection
    {
        return Product::query()
            ->where('title_kz', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%")
            ->get();
    }
}
