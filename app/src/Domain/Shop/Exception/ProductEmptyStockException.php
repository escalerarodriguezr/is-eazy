<?php
declare(strict_types=1);

namespace IsEazy\Domain\Shop\Exception;

use IsEazy\Domain\Product\Model\Product;
use IsEazy\Domain\Shop\Model\Shop;

class ProductEmptyStockException extends \DomainException
{
    public static function fromSellProductUseService(Shop $shop, Product $product): self
    {
        throw new self(
            sprintf('Stock of product: %s out of stock in store: "%s"',
            $product->name,
            $shop->name
            )
        );
    }

}
