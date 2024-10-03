<?php

namespace App\Models;

use App\Http\Enums\LanguageEnum;
use App\Http\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $questionnaire_id
 * @property string $title_kz
 * @property string $title_ru
 * @property string $description_kz
 * @property string $description_ru
 * @property string $image
 * @property-read string $title
 * @property-read string $description
 * @property-read Questionnaire|null $questionnaire
 */
final class QuestionnaireDetail extends Model
{
    use LocaleTrait;

    protected $table = 'questionnaires_details';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'questionnaire_id',
        'title_kz',
        'title_ru',
        'description_kz',
        'description_ru',
        'image',
    ];

    public function getTitleAttribute(?string $language = null): ?string
    {
        return match ($language ?? self::getLocale()) {
            LanguageEnum::RUSSIAN->value => ($this->title_ru) ? $this->title_ru : $this->title_kz,
            default => $this->title_kz,
        };
    }

    public function getDescriptionAttribute(?string $language = null): ?string
    {
        return match ($language ?? self::getLocale()) {
            LanguageEnum::RUSSIAN->value => ($this->description_ru) ? $this->description_ru : $this->description_kz,
            default => $this->description_kz,
        };
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id', 'id');
    }
}
