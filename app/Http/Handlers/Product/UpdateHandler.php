<?php

namespace App\Http\Handlers\Product;

use App\Http\DTO\Product\StoreDTO;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

final readonly class UpdateHandler
{
    public function handle(Product $product, StoreDTO $dto): Product
    {
        return DB::transaction(function () use ($product, $dto) {
            $product->title_kz = $dto->titleKz;
            if($dto->titleRu) $product->title_ru = $dto->titleRu;
            if($dto->descriptionKz) $product->description_kz = $dto->descriptionKz;
            if($dto->descriptionRu) $product->description_ru = $dto->descriptionRu;
            $product->real_price = $dto->realPrice;
            if($dto->discountPercentage)
            {
                $product->discount_percentage = $dto->discountPercentage;

                $discountPrice = ($product->real_price * (100 - $dto->discountPercentage)) / 100;
                $product->discount_price = $discountPrice;
            }
            $product->sub_category_id = $dto->subCategoryId;

            if($dto->image)
            {
                $imagePath = $dto->image->store('images', 'public');
                $product->image_url = $imagePath;
            }

            $product->save();

            return $product;

        });
    }
}
