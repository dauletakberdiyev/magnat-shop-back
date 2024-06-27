<?php

namespace App\Http\Handlers\SubCategory;

use App\Http\DTO\SubCategory\StoreDTO;
use App\Models\SubCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final readonly class StoreHandler
{
    public function handle(StoreDTO $dto): Model
    {
        return DB::transaction(function () use ($dto) {
            $newSubCategory = new SubCategories();

            $newSubCategory->title_kz = $dto->titleKz;
            $newSubCategory->title_ru = $dto->titleRu;
            $newSubCategory->category_id = $dto->categoryId;

            $imagePath = $dto->image->store('images', 'public');
            $newSubCategory->image_url = $imagePath;

            $newSubCategory->save();

            return $newSubCategory;
        });
    }
}
