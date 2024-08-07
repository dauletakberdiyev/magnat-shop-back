<?php

namespace App\Http\Requests\Questionnaire;

use App\Http\DTO\Questionnaire\UpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_kz' => ['required', 'string'],
            'title_ru' => ['required', 'string'],
        ];
    }

    public function getDTO(): UpdateDTO
    {
        return new UpdateDTO(
            $this->validated('title_kz'),
            $this->validated('title_ru'),
        );
    }
}
