<?php

namespace App\Http\Resources\QuestionnaireDetails;

use App\Models\QuestionnaireDetail;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin QuestionnaireDetail
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
            'description' => $this->description,
            'description_kz' => $this->description_kz,
            'description_ru' => $this->description_ru,
            'questionnaire' => new QuestionnaireResource($this->questionnaire),
        ];
    }
}
