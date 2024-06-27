<?php

namespace App\Http\Resources\Product;

use App\Models\SubCategories;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin SubCategories
 */
final class SubCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title_kz,
            'image_url' => $this->image_url
        ];
    }
}
