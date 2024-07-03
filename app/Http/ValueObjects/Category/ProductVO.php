<?php

namespace App\Http\ValueObjects\Category;

use App\Http\Enums\LanguageEnum;
use App\Http\Traits\LocaleTrait;
use App\Models\SubCategories;
use Illuminate\Support\Arr;

final readonly class ProductVO
{
    use LocaleTrait;

    public function __construct(
        public int $id,
        public string $title,
        public ?string $description,
        public float $realPrice,
        public ?float $discountPrice,
        public ?int $discountPercentage,
        public bool $isExist,
        public ?string $imageUrl,
        public SubCategories $subCategory,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (int) Arr::get($data, 'id'),
            (self::getLocale() === LanguageEnum::KAZAKH->value) ? Arr::get($data, 'title_kz') : Arr::get($data, 'title_ru'),
            (self::getLocale() === LanguageEnum::KAZAKH->value) ? Arr::get($data, 'description_kz') : Arr::get($data, 'description_ru'),
            (float) Arr::get($data, 'real_price'),
            (float) Arr::get($data, 'discount_price') ?? null,
            (float) Arr::get($data, 'discount_percentage') ?? null,
            (bool) Arr::get($data, 'is_exist'),
            Arr::get($data, 'image_url') ?? null,
            Arr::get($data, 'subCategory'),
        );
    }

    public static function fromObject(object $data): self
    {
        return new self(
            (int) $data->id,
            (self::getLocale() === LanguageEnum::KAZAKH->value) ? $data->title_kz : $data->title_ru,
            (self::getLocale() === LanguageEnum::KAZAKH->value) ? $data->description_kz : $data->description_ru,
            (float) $data->real_price,
            (float) $data->discount_price ?? null,
            (float) $data->discount_percentage ?? null,
            (bool) $data->is_exist,
            $data->image_url ?? null,
            $data->subCategory,
        );
    }
}
