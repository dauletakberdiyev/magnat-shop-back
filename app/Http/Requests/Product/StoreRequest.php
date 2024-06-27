<?php

namespace App\Http\Requests\Product;

use App\Http\DTO\Product\StoreDTO;
use App\Models\SubCategories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

final class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['nullable', 'string'],
            'description_kz' => ['nullable', 'string'],
            'description_ru' => ['nullable', 'string'],
            'real_price' => ['required', 'numeric'],
            'discount_percentage' => ['nullable', 'numeric'],
            'sub_category_id' => ['required', 'integer', new Exists(SubCategories::class, 'id')],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }

    public function getDto(): StoreDTO
    {
        return new StoreDTO(
            $this->validated('title_kz'),
            $this->validated('title_ru'),
            $this->validated('description_kz'),
            $this->validated('description_ru'),
            (float) $this->validated('real_price'),
            (float) $this->validated('discount_price'),
            (float) $this->validated('discount_percentage'),
            (int) $this->validated('sub_category_id'),
            $this->file('image'),
        );
    }
}
