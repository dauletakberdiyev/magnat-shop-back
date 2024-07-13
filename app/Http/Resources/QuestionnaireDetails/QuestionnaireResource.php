<?php

namespace App\Http\Resources\QuestionnaireDetails;

use App\Models\Questionnaire;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Questionnaire
 */
final class QuestionnaireResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
