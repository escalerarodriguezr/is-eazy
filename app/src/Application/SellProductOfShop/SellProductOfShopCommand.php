<?php
declare(strict_types=1);

namespace IsEazy\Application\SellProductOfShop;

class SellProductOfShopCommand
{

    public function __construct(
        public readonly int $shopId,
        public readonly int $productId
    )
    {
    }
}
