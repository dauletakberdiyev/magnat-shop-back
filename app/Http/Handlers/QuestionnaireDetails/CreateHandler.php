<?php

namespace App\Http\Handlers\QuestionnaireDetails;

use App\Models\QuestionnaireDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final readonly class CreateHandler
{
    public function handle(int $questionnaireId, array $dto): Collection
    {
        return DB::transaction(function () use ($questionnaireId, $dto) {
            foreach ($dto as $detail) {
                $newQuestionnaireDetail = new QuestionnaireDetail();

                $newQuestionnaireDetail->questionnaire_id = $questionnaireId;
                $newQuestionnaireDetail->title_kz = $detail['title_kz'];
                if ($detail['title_ru']) $newQuestionnaireDetail->title_ru = $detail['title_ru'];
                $newQuestionnaireDetail->description_kz = $detail['description_kz'];
                if ($detail['description_ru']) $newQuestionnaireDetail->description_ru = $detail['description_ru'];

                if(isset($detail['image']))
                {
                    $imagePath = $detail['image']->store('images', 'public');
                    $newQuestionnaireDetail->image = $imagePath;
                }

                $newQuestionnaireDetail->save();
            }

            return QuestionnaireDetail::query()->where('questionnaire_id', $questionnaireId)->get();
        });
    }
}
