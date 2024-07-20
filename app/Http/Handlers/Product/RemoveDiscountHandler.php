<?php

namespace App\Http\Handlers\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

final readonly class RemoveDiscountHandler
{
    public function handle(Product $product): Product
    {
        return DB::transaction(function () use ($product) {
            $product->discount_percentage = null;
            $product->discount_price = null;

            $product->save();

            return $product;
        });
    }
}
