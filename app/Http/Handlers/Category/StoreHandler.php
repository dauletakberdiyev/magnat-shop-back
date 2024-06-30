<?php

namespace App\Http\Handlers\Category;

use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final readonly class StoreHandler
{
    public function handle(string $titleKz, ?string $titleRu, ?array $subCategories): Model
    {
        return DB::transaction(function () use ($titleKz, $titleRu, $subCategories) {
            $newCategory = new Category();

            $newCategory->title_kz = $titleKz;
            if($titleRu) $newCategory->title_ru = $titleRu;

            $newCategory->save();

            if($subCategories)
            {
                foreach ($subCategories as $subCategory) {
                    $newSubCategory = new SubCategories();

                    $newSubCategory->title_kz = $subCategory['title_kz'];
                    if($subCategory['title_ru']) $newSubCategory->title_ru = $subCategory['title_ru'];
                    $newSubCategory->category_id = $newCategory->id;

                    $newSubCategory->save();
                }
            }

            return $newCategory;
        });
    }
}
