<?php

namespace App\Http\Handlers\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

final readonly class IndexHandler
{
    public function handle(): Collection
    {
        return Product::query()
            ->get();
    }
}
