<?php

namespace App\Http\Requests\Category;

use App\Http\DTO\Category\UpdateDTO;
use App\Models\SubCategories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

final class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['required', 'string'],
            'subcategories' => ['nullable', 'array'],
            'subcategories.*.id' => ['nullable', 'integer', new Exists(SubCategories::class, 'id')],
            'subcategories.*.title_kz' => ['nullable', 'string'],
            'subcategories.*.title_ru' => ['nullable', 'string'],
            'subcategories.*.image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }

    public function getDTO(): UpdateDTO
    {
        return new UpdateDTO(
            $this->validated('title_kz'),
            $this->validated('title_ru'),
            $this->validated('subcategories'),
        );
    }
}
