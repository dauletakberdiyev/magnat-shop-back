<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $title_kz
 * @property string $title_ru
 * @property string $description_kz
 * @property string $description_ru
 * @property float $real_price
 * @property float $discount_price
 * @property int $discount_percentage
 * @property bool $is_exist
 * @property int $sub_category_id
 * @property string $image_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read SubCategories $subCategory
 */
final class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_kz',
        'title_ru',
        'description_kz',
        'description_ru',
        'real_price',
        'discount_price',
        'discount_percentage',
        'is_exist',
        'sub_category_id',
        'image_url',
        'created_at',
        'updated_at'
    ];

    public function subCategory(): HasOne
    {
        return $this->hasOne(SubCategories::class, 'id', 'sub_category_id');
    }
}