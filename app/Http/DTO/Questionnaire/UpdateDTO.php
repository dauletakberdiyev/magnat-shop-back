<?php

namespace App\Http\DTO\Questionnaire;

final readonly class UpdateDTO
{
    public function __construct(
        public string $titleKz,
        public string $titleRu,
    ) {
    }
}
