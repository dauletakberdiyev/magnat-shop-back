<?php

namespace App\Http\Handlers\Questionnaire;

use App\Http\DTO\Questionnaire\UpdateDTO;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;

final readonly class UpdateHandler
{
    public function handle(Questionnaire $questionnaire, UpdateDTO $dto): Questionnaire
    {
        return DB::transaction(function () use ($questionnaire, $dto) {
            $questionnaire->title_kz = $dto->titleKz;
            $questionnaire->title_ru = $dto->titleRu;

            $questionnaire->save();

            return $questionnaire;
        });
    }
}
