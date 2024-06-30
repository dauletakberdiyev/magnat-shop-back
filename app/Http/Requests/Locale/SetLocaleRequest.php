<?php

namespace App\Http\Requests\Locale;

use Illuminate\Foundation\Http\FormRequest;

final class SetLocaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'locale' => ['required', 'string'],
        ];
    }

    public function getLanguage(): string
    {
        return $this->validated('locale');
    }
}
