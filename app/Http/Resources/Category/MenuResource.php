<?php

namespace App\Http\Resources\Category;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\SubCategoryResource;

/**
 * @mixin Category
 */
final class MenuResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_kz,
            'subCategories' => SubCategoryResource::collection($this->subCategories)
        ];
    }
}
