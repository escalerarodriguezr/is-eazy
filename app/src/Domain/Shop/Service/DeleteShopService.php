<?php
declare(strict_types=1);

namespace IsEazy\Domain\Shop\Service;

use Illuminate\Support\Facades\DB;
use IsEazy\Domain\Shop\Model\Shop;

class DeleteShopService
{
    public function __invoke (int $id): void
    {
        $shop = Shop::findOrFail($id);
        DB::table('product_shop')->where('shop_id', $shop->id)->delete();
        $shop->delete();
    }

}
