<?php

namespace App\Http\Middleware;

use App\Http\Enums\LanguageEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('language')) {
            App::setLocale((string) $request->get('language'));
            $request->setLocale((string) $request->get('language'));

            return $next($request);
        }

        App::setLocale(LanguageEnum::KAZAKH->value);
        $request->setLocale(LanguageEnum::KAZAKH->value);

        return $next($request);
    }
}
