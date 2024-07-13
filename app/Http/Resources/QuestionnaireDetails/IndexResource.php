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
            'description' => $this->description,
            'questionnaire' => new QuestionnaireResource($this->questionnaire),
        ];
    }
}
