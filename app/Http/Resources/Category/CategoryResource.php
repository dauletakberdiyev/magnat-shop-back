<?php

namespace App\Http\Resources\Category;

use App\Http\DTO\Product\ShowDTO;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\SubCategoryResource;

/**
 * @mixin ShowDTO
 */
final class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_categories' => SubCategoryResource::collection($this->subCategories),
            'products' => ProductVOResource::collection($this->products),
        ];
    }
}
