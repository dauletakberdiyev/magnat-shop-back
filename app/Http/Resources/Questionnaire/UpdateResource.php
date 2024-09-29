<?php

namespace App\Http\Resources\Questionnaire;

use App\Models\Questionnaire;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Questionnaire
 */
final class UpdateResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title_kz' => $this->title_kz,
            'title_ru' => $this->title_ru,
        ];
    }
}
