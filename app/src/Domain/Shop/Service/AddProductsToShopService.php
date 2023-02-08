<?php
declare(strict_types=1);

namespace IsEazy\Domain\Shop\Service;

use Illuminate\Support\Collection;
use IsEazy\Domain\Product\Model\Product;
use IsEazy\Domain\Shop\Model\Shop;

class AddProductsToShopService
{
    public function __invoke (Shop $shop, Collection $products): void
    {
        $products->each(function (array $product) use ($shop) {
            $productName = $product['name'];
            $product = Product::findByName($productName);
            if(!$product){
                $product = new Product();
                $product->name=$productName;
                $product->save();
            }
            $shop->products()->attach($product);
        });
    }

}
