<?php

namespace App\Http\Requests\Auth;

use App\Http\DTO\Auth\LoginDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

final class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', new Exists(User::class, 'email')],
            'password' => ['required', 'string'],
        ];
    }

    public function getDto(): LoginDTO
    {
        return new LoginDTO(
            $this->validated('email'),
            $this->validated('password')
        );
    }
}
