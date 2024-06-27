<?php

namespace App\Http\Handlers\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final readonly class StoreHandler
{
    public function handle(string $titleKz, string $titleRu): Model
    {
        return DB::transaction(function () use ($titleKz, $titleRu) {
            $newCategory = new Category();

            $newCategory->title_kz = $titleKz;
            $newCategory->title_ru = $titleRu;

            $newCategory->save();

            return $newCategory;
        });
    }
}
