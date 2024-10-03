<?php

namespace App\Http\DTO\Category;

final readonly class UpdateDTO
{
    public function __construct(
        public string $titleKz,
        public string $titleRu,
        public ?array $subcategories,
    ) {}
}
