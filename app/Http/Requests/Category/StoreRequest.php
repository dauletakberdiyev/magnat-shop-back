<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['required', 'string'],
        ];
    }

    public function getTitleKz(): string
    {
        return $this->validated('title_kz');
    }

    public function getTitleRu(): string
    {
        return $this->validated('title_ru');
    }
}
