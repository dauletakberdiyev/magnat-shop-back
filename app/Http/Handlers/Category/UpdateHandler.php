<?php

namespace App\Http\Handlers\Category;

use App\Http\DTO\Category\UpdateDTO;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

final readonly class UpdateHandler
{
    public function handle(Category $category, UpdateDTO $dto): Category
    {
        return DB::transaction(function () use ($category, $dto) {
            $category->title_kz = $dto->titleKz;
            $category->title_ru = $dto->titleRu;

            $category->save();

            return $category;
        });
    }
}
