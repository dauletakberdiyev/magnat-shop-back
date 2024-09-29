<?php

namespace App\Models;

use App\Http\Enums\LanguageEnum;
use App\Http\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title_kz
 * @property string $title_ru
 * @property-read string $title
 */
final class Questionnaire extends Model
{
    use LocaleTrait;

    protected $table = 'questionnaires';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'title_kz',
        'title_ru'
    ];

    public function getTitleAttribute(?string $language = null): ?string
    {
        return match ($language ?? self::getLocale()) {
            LanguageEnum::RUSSIAN->value => ($this->title_ru) ? $this->title_ru : $this->title_kz,
            default => $this->title_kz,
        };
    }
}
