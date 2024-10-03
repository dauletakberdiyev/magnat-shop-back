<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Product\SubCategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Category
 */
final class MenuResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subCategories' => SubCategoryResource::collection($this->subCategories),
        ];
    }
}
