<?php

namespace App\Http\Contracts\Repositories\Products;

use Illuminate\Database\Eloquent\Builder;

interface ProductRepositoryInterface
{
    public function all(): Builder;
}
