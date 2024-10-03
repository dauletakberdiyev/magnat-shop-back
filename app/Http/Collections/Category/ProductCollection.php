<?php

namespace App\Http\Collections\Category;

use App\Http\ValueObjects\Category\ProductVO;
use Illuminate\Support\Collection;
use RuntimeException;

final class ProductCollection extends Collection
{
    public static function make($items = []): self
    {
        $self = new self();

        foreach ($items as $item) {
            foreach ($item as $product) {
                $self->add(ProductVO::fromObject($product));
            }
        }

        return $self;
    }

    public function add($item): self
    {
        if (! $item instanceof ProductVO) {
            throw new RuntimeException('Item must be of the type ProductVO');
        }

        return parent::add($item);
    }
}
