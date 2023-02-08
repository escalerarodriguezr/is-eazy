<?php
declare(strict_types=1);

namespace IsEazy\Domain\Shop\Service;

use IsEazy\Domain\Shop\Model\Shop;

class EditShopService
{
    public function __invoke (int $id, ?string $name): Shop
    {
        $shop = Shop::findOrFail($id);

        if(!empty($name)){
            $shop->name = $name;
        }
        $shop->save();
        return $shop;
    }



}
