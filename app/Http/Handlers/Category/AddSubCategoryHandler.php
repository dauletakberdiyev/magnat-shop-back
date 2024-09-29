<?php

namespace App\Http\Handlers\Category;

use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Support\Facades\DB;

final readonly class AddSubCategoryHandler
{
    public function handle(Category $category, array $dto): void
    {
        DB::transaction(function () use ($category, $dto)
        {
            foreach ($dto as $subcategory)
            {
                $newSubcategory = new SubCategories();

                $newSubcategory->category_id = $category->id;
                $newSubcategory->title_kz = $subcategory['title_kz'];
                $newSubcategory->title_ru = $subcategory['title_ru'];

                if (isset($subcategory['image']))
                {
                    $imagePath = $subcategory['image']->store('images', 'public');
                    $newSubcategory->image_url = $imagePath;
                }

                $newSubcategory->save();
            }
        });
    }
}
