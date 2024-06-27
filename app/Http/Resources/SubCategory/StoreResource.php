<?php

namespace App\Http\Resources\SubCategory;

use App\Models\SubCategories;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin SubCategories
 */
final class StoreResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title_kz' => $this->title_kz,
            'title_ru' => $this->title_ru,
            'image_url' => $this->image_url,
        ];
    }
}
