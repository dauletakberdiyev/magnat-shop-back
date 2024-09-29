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
            'title_kz' => $this->title_kz,
            'title_ru' => $this->title_ru,
            'description' => $this->description,
            'description_kz' => $this->description_kz,
            'description_ru' => $this->description_ru,
            'real_price' => $this->real_price,
            'discount_price' => $this->discount_price,
            'discount_percentage' => $this->discount_percentage,
            'image_url' => $this->image_url,
            'images' => $this->imageList,
            'is_exist' => (bool) $this->is_exist,
            'unit' => $this->unit,
            'subcategory' => new SubCategoryResource($this->subCategory),
            'category' => new CategoryResource($this->subCategory?->category)
        ];
    }
}
