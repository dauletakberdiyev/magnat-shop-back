<?php

namespace App\Http\Services\Cache;

use Closure;
use DateInterval;
use DateTimeInterface;
use Illuminate\Support\Facades\Cache;

final class CacheService
{
    const CACHE_TTL = 1800;

    public function remember(string $key, Closure $callback, Closure|DateInterval|DateTimeInterface|int|null $ttl = self::CACHE_TTL): mixed
    {
        return Cache::remember($key, $ttl, $callback);
    }
}
