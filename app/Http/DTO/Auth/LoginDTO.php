<?php

namespace App\Http\DTO\Auth;

final readonly class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
