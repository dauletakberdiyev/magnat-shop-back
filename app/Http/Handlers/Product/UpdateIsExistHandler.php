<?php

namespace App\Http\Handlers\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

final readonly class UpdateIsExistHandler
{
    public function handle(Product $product, bool $isExist): Product
    {
        return DB::transaction(function () use ($product, $isExist) {
            $product->is_exist = $isExist;

            $product->save();

            return $product;
        });
    }
}
