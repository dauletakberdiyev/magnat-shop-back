<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title_kz
 * @property string $title_ru
 * @property-read SubCategories[]|Collection $subCategories
 */
final class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'title_kz',
        'title_ru'
    ];

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategories::class, 'category_id', 'id');
    }
}
