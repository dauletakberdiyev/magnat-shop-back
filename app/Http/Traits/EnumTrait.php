<?php

namespace App\Http\Traits;

/**
 * @method static mixed cases()
 */
trait EnumTrait
{
    public static function getAllValues(): array
    {
        return array_column(static::cases(), 'value');
    }

    public static function make(array $from): array
    {
        $result = [];

        /** @var string $value */
        foreach ($from as $value) {
            $result[] = self::from($value);
        }

        return $result;
    }
}
