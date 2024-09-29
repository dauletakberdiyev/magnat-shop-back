<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

final class AddSubCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'subcategories' => ['required', 'array'],
            'subcategories.*.title_kz' => ['required', 'string'],
            'subcategories.*.title_ru' => ['nullable', 'string'],
            'subcategories.*.image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function getDTO(): array
    {
        return $this->validated('subcategories');
    }
}
