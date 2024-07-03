<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateIsExistRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'is_exist' => ['required', 'boolean']
        ];
    }

    public function getIsExist(): bool
    {
        return $this->validated('is_exist');
    }
}
