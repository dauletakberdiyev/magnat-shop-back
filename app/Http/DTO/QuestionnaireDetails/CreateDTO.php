<?php

namespace App\Http\DTO\QuestionnaireDetails;

use Illuminate\Http\UploadedFile;

final readonly class CreateDTO
{
    public function __construct(
        public string $titleKz,
        public ?string $titleRu,
        public string $descriptionKz,
        public ?string $descriptionRu,
        public ?UploadedFile $image,
    ) {
    }
}
