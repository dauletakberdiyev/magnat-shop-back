<?php

namespace App\Http\Enums;

use App\Http\Traits\EnumTrait;

enum LanguageEnum: string
{
    use EnumTrait;

    case ENGLISH = 'en';
    case RUSSIAN = 'ru';
    case KAZAKH = 'kz';
}
