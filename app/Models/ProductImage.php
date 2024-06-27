<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property string $image_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class ProductImage extends Model
{
    protected $table = 'products_images';
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'image_url',
        'created_at',
        'updated_at'
    ];
}
