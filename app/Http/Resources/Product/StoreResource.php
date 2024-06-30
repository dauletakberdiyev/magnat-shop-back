<?php

namespace App\Http\Resources\Product;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */
final class StoreResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_kz,
            'description' => $this->description_kz,
            'real_price' => $this->real_price,
            'discount_price' => $this->discount_price,
            'discount_percentage' => $this->discount_percentage,
            'is_exist' => (bool) $this->is_exist,
            'sub_category_id' => new SubCategoryResource($this->subCategory),
            'image_url' => $this->image_url,
        ];
    }
}
