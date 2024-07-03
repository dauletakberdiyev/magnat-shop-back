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
        $imageUrl = $this->products->get(0)?->image_url;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_url' => $imageUrl
        ];
    }
}
