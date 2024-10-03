<?php

namespace App\Models;

use App\Http\Enums\LanguageEnum;
use App\Http\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $title_kz
 * @property string $title_ru
 * @property int $category_id
 * @property string $image_url
 * @property-read string|null $title
 * @property-read Product[]|Collection $products
 * @property-read Category|null $category
 */
final class SubCategories extends Model
{
    use LocaleTrait;

    protected $table = 'sub_categories';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'title_kz',
        'title_ru',
        'category_id',
        'image_url',
    ];

    public function getTitleAttribute(?string $language = null): ?string
    {
        return match ($language ?? self::getLocale()) {
            LanguageEnum::RUSSIAN->value => ($this->title_ru) ? $this->title_ru : $this->title_kz,
            default => $this->title_kz,
        };
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'sub_category_id', 'id');
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
