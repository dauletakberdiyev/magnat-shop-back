<?php

namespace App\Http\Handlers\Category;

use App\Http\DTO\Product\SubCategoryDTO;
use App\Models\Category;
use App\Models\SubCategories;

final readonly class SubCategoryHandler
{
    public function handle(Category $category, SubCategories $subCategory): SubCategoryDTO
    {
        return new SubCategoryDTO(
            $category->id,
            $category->title,
            $subCategory->id,
            $subCategory->title,
            $subCategory->products
        );
    }
}
