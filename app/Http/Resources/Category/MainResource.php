<?php

namespace App\Http\Resources\Category;

use App\Http\Collections\Category\ProductCollection;
use App\Http\Resources\Product\SubCategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Category
 */
final class MainResource extends JsonResource
{
    public function toArray($request): array
    {
        $products = $this->subCategories->map(function ($subCategory) {
            return $subCategory->products;
        });

        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_categories' => SubCategoryResource::collection($this->subCategories),
            'products' => ProductVOResource::collection(ProductCollection::make($products)),
        ];
    }
}
