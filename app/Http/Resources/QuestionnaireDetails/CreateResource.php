<?php

namespace App\Http\Resources\QuestionnaireDetails;

use App\Models\QuestionnaireDetail;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin QuestionnaireDetail
 */
final class CreateResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title_kz' => $this->title_kz,
            'title_ru' => $this->title_ru,
            'description_kz' => $this->description_kz,
            'description_ru' => $this->description_ru,
            'image' => $this->image,
            'questionnaire' => $this->questionnaire,
        ];
    }
}
