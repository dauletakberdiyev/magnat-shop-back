<?php

namespace App\Http\Handlers\Category;

use App\Http\Collections\Category\ProductCollection;
use App\Http\DTO\Product\ShowDTO;
use App\Models\Category;

final readonly class ShowHandler
{
    public function handle(int $categoryId): ShowDTO
    {
        /** @var Category $category */
        $category = Category::query()
            ->where('id', $categoryId)
            ->with([
                'subcategories.products.subCategory'
            ])
            ->first();

        $products = $category->subCategories->map(function ($subCategory) {
            return $subCategory->products;
        });

        return new ShowDTO(
            $categoryId,
            $category->title,
            $category->title_kz,
            $category->title_ru,
            $category->subCategories,
            ProductCollection::make($products)
        );
    }
}
