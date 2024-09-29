<?php

namespace App\Http\Repositories\Products;

use App\Http\Contracts\Repositories\Products\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

final class ProductRepository implements ProductRepositoryInterface
{
    public function all(): Builder
    {
        return Product::query();
    }
}
