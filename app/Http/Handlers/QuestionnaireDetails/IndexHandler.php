<?php

namespace App\Http\Handlers\QuestionnaireDetails;

use App\Models\QuestionnaireDetail;
use Illuminate\Database\Eloquent\Collection;

final readonly class IndexHandler
{
    public function handle(int $questionnaireId): Collection
    {
        return QuestionnaireDetail::query()
            ->with('questionnaire')
            ->where('questionnaire_id', $questionnaireId)
            ->get();
    }
}
