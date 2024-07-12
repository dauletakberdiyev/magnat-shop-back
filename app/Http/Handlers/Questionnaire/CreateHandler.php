<?php

namespace App\Http\Handlers\Questionnaire;

use App\Http\DTO\Questionnaire\CreateDTO;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;

final readonly class CreateHandler
{
    public function handle(CreateDTO $dto): Questionnaire
    {
        return DB::transaction(function () use ($dto) {
            $newQuestionnaire = new Questionnaire();

            $newQuestionnaire->title_kz = $dto->titleKz;
            $newQuestionnaire->title_ru = $dto->titleRu;

            $newQuestionnaire->save();

            return $newQuestionnaire;
        });
    }
}
