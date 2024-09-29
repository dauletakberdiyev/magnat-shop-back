<?php

namespace App\Http\Resources\Product;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */
final class IndexResource extends JsonResource
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
            'is_exist' => $this->is_exist,
            'image_url' => $this->image_url,
            'unit' => $this->unit,
            'sub_category' => new SubCategoryResource($this->subCategory),
        ];
    }
}
