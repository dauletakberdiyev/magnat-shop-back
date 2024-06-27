<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

final class FindRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['required', 'string'],
        ];
    }

    public function getSearch(): string
    {
        return $this->validated('search');
    }
}
