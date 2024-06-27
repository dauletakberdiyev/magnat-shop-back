<?php

namespace App\Http\Requests\SubCategory;

use App\Http\DTO\SubCategory\StoreDTO;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

final class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['required', 'string'],
            'category_id' => ['required', 'integer', new Exists(Category::class, 'id')],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }

    public function getDto(): StoreDTO
    {
        return new StoreDTO(
            $this->validated('title_kz'),
            $this->validated('title_ru'),
            (int) $this->validated('category_id'),
            $this->file('image'),
        );
    }
}
