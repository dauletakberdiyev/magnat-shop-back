<?php

namespace App\Http\Handlers\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

final class ShowHandler
{
    public function handle(int $productId): Model
    {
        return Product::query()
            ->with([
                'subCategory.category'
            ])
            ->where('id', $productId)
            ->first();
    }
}
