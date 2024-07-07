<?php

namespace App\Http\DTO\Product;


use Illuminate\Http\UploadedFile;

final readonly class StoreDTO
{
    public function __construct(
        public string $titleKz,
        public ?string $titleRu,
        public ?string $descriptionKz,
        public ?string $descriptionRu,
        public float $realPrice,
        public ?float $discountPrice,
        public ?float $discountPercentage,
        public int $subCategoryId,
        public string $unit,
        public ?UploadedFile $image,
        public ?array $images,
    ) {
    }
}
