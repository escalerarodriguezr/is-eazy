<?php
declare(strict_types=1);

namespace IsEazy\Application\CreateShop;

class CreateShopCommand
{
    public function __construct(
        public readonly string $name,
        public readonly array $products
    )
    {
    }
}
