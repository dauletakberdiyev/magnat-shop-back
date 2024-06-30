<?php

namespace App\Http\Controllers\Locale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Locale\SetLocaleRequest;
use Illuminate\Support\Facades\App;

final class LocaleController extends Controller
{
    public function setLocaleLanguage(SetLocaleRequest $request): void
    {
        App::setLocale($request->getLanguage());
    }
}
