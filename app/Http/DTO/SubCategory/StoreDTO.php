<?php

namespace App\Http\DTO\SubCategory;

use Illuminate\Http\UploadedFile;

final readonly class StoreDTO
{
    public function __construct(
        public string $titleKz,
        public string $titleRu,
        public int $categoryId,
        public UploadedFile $image,
    ) {
    }
}
