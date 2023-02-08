<?php
declare(strict_types=1);

namespace IsEazy\Application\ListAllShopsWithNumberOfProducts;

use Illuminate\Support\Collection;
use IsEazy\Domain\Shop\Model\Shop;

class ListAllShopsWithNumberOfProducts
{
    public function __invoke(): Collection
    {
        return Shop::withCount('products')->get();
    }

}
