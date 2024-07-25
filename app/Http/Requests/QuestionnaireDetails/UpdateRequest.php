<?php

namespace App\Http\Requests\QuestionnaireDetails;

use App\Models\QuestionnaireDetail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

final class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'details' => ['required', 'array'],
            'details.*.id' => ['required', 'integer', new Exists(QuestionnaireDetail::class, 'id')],
            'details.*.title_kz' => ['required', 'string'],
            'details.*.title_ru' => ['nullable', 'string'],
            'details.*.description_kz' => ['required', 'string'],
            'details.*.description_ru' => ['nullable', 'string'],
            'details.*.image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function getDetails(): array
    {
        return $this->validated('details');
    }
}
