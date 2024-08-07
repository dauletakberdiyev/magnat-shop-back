<?php

namespace App\Http\DTO\Product;

use App\Http\Collections\Category\ProductCollection;
use Illuminate\Database\Eloquent\Collection;

final readonly class ShowDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $titleKz,
        public string $titleRu,
        public Collection $subCategories,
        public ProductCollection $products
    ) {
    }
}
