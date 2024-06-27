<?php

namespace App\Http\ValueObjects\Category;

use Illuminate\Support\Arr;

final readonly class ProductVO
{
    public function __construct(
        public int $id,
        public string $title,
        public ?string $description,
        public float $realPrice,
        public ?float $discountPrice,
        public ?int $discountPercentage,
        public bool $isExist,
        public ?string $imageUrl,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (int) Arr::get($data, 'id'),
            Arr::get($data, 'title_kz'),
            Arr::get($data, 'description_kz') ?? null,
            (float) Arr::get($data, 'real_price'),
            (float) Arr::get($data, 'discount_price') ?? null,
            (float) Arr::get($data, 'discount_percentage') ?? null,
            (bool) Arr::get($data, 'is_exist'),
            Arr::get($data, 'image_url') ?? null,
        );
    }

    public static function fromObject(object $data): self
    {
        return new self(
            (int) $data->id,
            $data->title_kz,
            $data->description_kz ?? null,
            (float) $data->real_price,
            (float) $data->discount_price ?? null,
            (float) $data->discount_percentage ?? null,
            (bool) $data->is_exist,
            $data->image_url ?? null,
        );
    }
}
