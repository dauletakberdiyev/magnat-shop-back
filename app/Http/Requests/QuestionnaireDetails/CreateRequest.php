<?php

namespace App\Http\Requests\QuestionnaireDetails;

use Illuminate\Foundation\Http\FormRequest;

final class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'details' => ['required', 'array'],
            'details.*.title_kz' => ['required', 'string'],
            'details.*.title_ru' => ['nullable', 'string'],
            'details.*.description_kz' => ['required', 'string'],
            'details.*.description_ru' => ['nullable', 'string'],
            'details.*.image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function getDTO(): array
    {
        return $this->validated('details');
    }
}
