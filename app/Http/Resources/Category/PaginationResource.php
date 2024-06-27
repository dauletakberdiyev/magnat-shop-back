<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @mixin LengthAwarePaginator
 */
final class PaginationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'total' => $this->total(),
            'from' => $this->firstItem(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'next_page_url' => $this->nextPageUrl(),
            'prev_page_url' => $this->previousPageUrl(),
            'categories' => MainResource::collection($this->getCollection())
        ];
    }
}
