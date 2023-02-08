<?php
declare(strict_types=1);

namespace IsEazy\Application\SellProductOfShop;

use IsEazy\Domain\Shop\Service\SellProductOfShopService;

class SellProductOfShopCommandHandler
{

    public function __construct(
        private readonly SellProductOfShopService $sellProductOfShopService
    )
    {
    }

    public function __invoke(SellProductOfShopCommand $command): int
    {
        return $this->sellProductOfShopService->__invoke($command->shopId,$command->productId);
    }

}
