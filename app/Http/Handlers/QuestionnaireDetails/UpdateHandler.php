<?php

namespace App\Http\Handlers\QuestionnaireDetails;

use App\Models\QuestionnaireDetail;
use Illuminate\Support\Facades\DB;

final readonly class UpdateHandler
{
    public function __construct(
        public CreateHandler $createHandler
    ) {}

    public function handle(int $questionnaireId, array $details): void
    {
        DB::transaction(function () use ($questionnaireId, $details) {
            QuestionnaireDetail::query()
                ->where('questionnaire_id', $questionnaireId)
                ->delete();

            $this->createHandler->handle($questionnaireId, $details);
        });
    }
}
