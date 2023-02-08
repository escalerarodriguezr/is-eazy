<?php
declare(strict_types=1);

namespace IsEazy\Domain\Shop\Service;

use Illuminate\Support\Facades\DB;
use IsEazy\Domain\Product\Model\Product;
use IsEazy\Domain\Shop\Exception\ProductEmptyStockException;
use IsEazy\Domain\Shop\Model\Shop;

class SellProductOfShopService
{
    public function __invoke (int $shopId, int $productId): int
    {
        $shop = Shop::WithProducts()->findOrFail($shopId);
        $product = Product::findOrFail($productId);

        $productRequiredStock = $shop->products->where('id', $productId)->count();


        if(empty($productRequiredStock)){
            throw ProductEmptyStockException::fromSellProductUseService($shop,$product);
        }

        $stockProduct = DB::table('product_shop')
            ->where('product_id', '=', $productId)
            ->where('shop_id', '=', $shopId)
            ->first();

        DB::table('product_shop')
            ->where('id', '=', $stockProduct->id)->delete();

        return ($productRequiredStock -1 );

    }

}
