<?php

namespace App\Http\Handlers\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

final class ShowHandler
{
    public function handle(int $productId): Model
    {
        /** @var Product $product */
        $product = Product::query()
            ->with([
                'subCategory.category',
                'images',
            ])
            ->where('id', $productId)
            ->first();

        return $product;
    }
}
