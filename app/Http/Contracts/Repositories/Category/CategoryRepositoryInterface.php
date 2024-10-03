<?php

namespace App\Http\Contracts\Repositories\Category;

use Illuminate\Database\Eloquent\Builder;

interface CategoryRepositoryInterface
{
    public function all(): Builder;
}
