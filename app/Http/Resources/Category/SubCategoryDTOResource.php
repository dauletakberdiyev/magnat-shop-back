<?php

namespace App\Http\Resources\Category;

use App\Http\DTO\Product\SubCategoryDTO;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin SubCategoryDTO
 */
final class SubCategoryDTOResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'category_id' => $this->categoryId,
            'category_title' => $this->categoryTitle,
            'sub_category_id' => $this->subCategoryId,
            'sub_category_title' => $this->subCategoryTitle,
            'products' => ProductResource::collection($this->products),
        ];
    }
}
