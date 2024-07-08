<?php

namespace App\Http\Handlers\Category;

use App\Http\DTO\Category\UpdateDTO;
use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

final readonly class UpdateHandler
{
    public function handle(Category $category, UpdateDTO $dto): Category
    {
        return DB::transaction(function () use ($category, $dto) {
            $category->title_kz = $dto->titleKz;
            $category->title_ru = $dto->titleRu;

            if (isset($dto->subCategories)) {
                foreach ($dto->subcategories as $subcategory) {
                    /** @var SubCategories $thisSubcategory */
                    $thisSubcategory = $category->subcategories()
                        ->where('id', $subcategory['id'])
                        ->first();

                    $thisSubcategory->update([
                        'title_kz' => $subcategory['title_kz'],
                        'title_ru' => $subcategory['title_ru'],
                    ]);

                    if (isset($subcategory['image']))
                    {
                        Storage::disk('public')->delete($thisSubcategory->image_url);

                        $imagePath = $subcategory['image']->store('images', 'public');
                        $thisSubcategory->image_url = $imagePath;
                        $thisSubcategory->save();
                    }
                }
            }

            $category->save();

            return $category;
        });
    }
}
