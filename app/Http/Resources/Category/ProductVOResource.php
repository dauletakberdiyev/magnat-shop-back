<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Product\SubCategoryResource;
use App\Http\ValueObjects\Category\ProductVO;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ProductVO
 */
final class ProductVOResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'real_price' => $this->realPrice,
            'discount_price' => $this->discountPrice,
            'discount_percentage' => $this->discountPercentage,
            'is_exist' => $this->isExist,
            'image_url' => $this->imageUrl,
            'unit' => $this->unit,
            'subcategory' => new SubCategoryResource($this->subCategory),
        ];
    }
}
