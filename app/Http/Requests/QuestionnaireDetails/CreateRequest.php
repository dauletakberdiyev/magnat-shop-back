<?php

namespace App\Http\Requests\QuestionnaireDetails;

use App\Http\DTO\QuestionnaireDetails\CreateDTO;
use Illuminate\Foundation\Http\FormRequest;

final class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['nullable', 'string'],
            'description_kz' => ['required', 'string'],
            'description_ru' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function getDTO(): CreateDTO
    {
        return new CreateDTO(
            $this->validated('title_kz'),
            $this->validated('title_ru'),
            $this->validated('description_kz'),
            $this->validated('description_ru'),
            $this->validated('image'),
        );
    }
}
