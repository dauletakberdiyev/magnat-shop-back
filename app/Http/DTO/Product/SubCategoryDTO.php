<?php

namespace App\Http\DTO\Product;

use Illuminate\Database\Eloquent\Collection;

final readonly class SubCategoryDTO
{
    public function __construct(
        public int $categoryId,
        public string $categoryTitle,
        public int $subCategoryId,
        public string $subCategoryTitle,
        public Collection $products
    ) {}
}
