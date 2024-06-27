<?php

namespace App\Http\DTO\Product;

use App\Http\Controllers\ProductCollection;
use Illuminate\Database\Eloquent\Collection;

final readonly class ShowDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public Collection $subCategories,
        public ProductCollection $products
    ) {
    }
}
