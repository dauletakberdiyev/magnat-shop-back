<?php

namespace App\Http\Requests\Questionnaire;

use App\Http\DTO\Questionnaire\CreateDTO;
use Illuminate\Foundation\Http\FormRequest;

final class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['nullable', 'string'],
        ];
    }

    public function getDTO(): CreateDTO
    {
        return new CreateDTO(
            $this->validated('title_kz'),
            $this->validated('title_ru')
        );
    }
}
