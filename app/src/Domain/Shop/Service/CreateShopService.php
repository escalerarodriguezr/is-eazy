<?php
declare(strict_types=1);

namespace IsEazy\Domain\Shop\Service;

use IsEazy\Domain\Shop\Model\Shop;

class CreateShopService
{
    public function __invoke (string $name): Shop
    {
        $shop = new Shop();
        $shop->name = $name;
        $shop->save();
        return $shop;
    }



}
