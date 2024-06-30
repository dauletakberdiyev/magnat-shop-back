<?php

namespace App\Http\Resources\Product;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */
final class ShowResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'real_price' => $this->real_price,
            'discount_price' => $this->discount_price,
            'discount_percentage' => $this->discount_percentage,
            'image_url' => $this->image_url,
            'images' => $this->imageList,
            'is_exist' => $this->is_exist,
            'subcategory' => new SubCategoryResource($this->subCategory),
            'category' => new CategoryResource($this->subCategory?->category)
        ];
    }
}
