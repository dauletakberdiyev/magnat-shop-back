<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['nullable', 'string'],
            'subcategories' => ['nullable', 'array'],
            'subcategories.*.title_kz' => ['nullable', 'string'],
            'subcategories.*.title_ru' => ['nullable', 'string'],
            'subcategories.*.image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }

    public function getTitleKz(): string
    {
        return $this->validated('title_kz');
    }

    public function getTitleRu(): ?string
    {
        return $this->validated('title_ru');
    }

    public function getSubcategories(): ?array
    {
        return $this->validated('subcategories');
    }
}
