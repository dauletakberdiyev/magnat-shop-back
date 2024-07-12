<?php

namespace App\Http\Handlers\QuestionnaireDetails;


use App\Http\DTO\QuestionnaireDetails\CreateDTO;
use App\Models\QuestionnaireDetail;
use Illuminate\Support\Facades\DB;

final readonly class CreateHandler
{
    public function handle(int $questionnaireId, CreateDTO $dto): QuestionnaireDetail
    {
        return DB::transaction(function () use ($questionnaireId, $dto) {
            $newQuestionnaireDetail = new QuestionnaireDetail();

            $newQuestionnaireDetail->questionnaire_id = $questionnaireId;
            $newQuestionnaireDetail->title_kz = $dto->titleKz;
            if ($dto->titleRu) $newQuestionnaireDetail->title_ru = $dto->titleRu;
            $newQuestionnaireDetail->description_kz = $dto->descriptionKz;
            if ($dto->descriptionRu) $newQuestionnaireDetail->description_ru = $dto->descriptionRu;

            if($dto->image)
            {
                $imagePath = $dto->image->store('images', 'public');
                $newQuestionnaireDetail->image = $imagePath;
            }

            $newQuestionnaireDetail->save();

            return $newQuestionnaireDetail;
        });
    }
}
