<?php

namespace App\Http\Resources\Questionnaire;

use App\Models\Questionnaire;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Questionnaire
 */
final class IndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'title_kz' => $this->title_kz,
            'title_ru' => $this->title_ru,
        ];
    }
}
