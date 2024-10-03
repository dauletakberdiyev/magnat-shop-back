<?php

namespace App\Models;

use App\Http\Enums\LanguageEnum;
use App\Http\Traits\LocaleTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $title_kz
 * @property string $title_ru
 * @property string $description_kz
 * @property string $description_ru
 * @property float $real_price
 * @property float $discount_price
 * @property int $discount_percentage
 * @property bool $is_exist
 * @property int $sub_category_id
 * @property string $unit
 * @property string $image_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read string|null $title
 * @property-read string|null $description
 * @property-read array $imageList
 * @property-read SubCategories $subCategory
 * @property-read ProductImage[]|Collection $images
 */
final class Product extends Model
{
    use LocaleTrait;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title_kz',
        'title_ru',
        'description_kz',
        'description_ru',
        'real_price',
        'discount_price',
        'discount_percentage',
        'is_exist',
        'sub_category_id',
        'unit',
        'image_url',
        'created_at',
        'updated_at',
    ];

    public function getTitleAttribute(?string $language = null): ?string
    {
        return match ($language ?? self::getLocale()) {
            LanguageEnum::RUSSIAN->value => ($this->title_ru) ? $this->title_ru : $this->title_kz,
            default => $this->title_kz,
        };
    }

    public function getDescriptionAttribute(?string $language = null): ?string
    {
        return match ($language ?? self::getLocale()) {
            LanguageEnum::RUSSIAN->value => ($this->description_ru) ? $this->description_ru : $this->description_kz,
            default => $this->description_kz,
        };
    }

    public function getImageListAttribute(): array
    {
        $images = $this->images->map(function ($image) {
            return $image->image_url;
        });

        return $images->toArray();
    }

    public function subCategory(): HasOne
    {
        return $this->hasOne(SubCategories::class, 'id', 'sub_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
