<?php
declare(strict_types=1);

namespace IsEazy\Application\CreateShop;

use IsEazy\Domain\Shop\Model\Shop;
use IsEazy\Domain\Shop\Service\AddProductsToShopService;
use IsEazy\Domain\Shop\Service\CreateShopService;

class CreateShopCommandHandler
{

    public function __construct(
        private readonly CreateShopService $createShopService,
        private readonly AddProductsToShopService $addProductsToShopService
    )
    {
    }

    public function __invoke(CreateShopCommand $command): Shop
    {
        $shop = $this->createShopService->__invoke($command->name);
        $this->addProductsToShopService->__invoke(
            $shop,
            collect($command->products)
        );

        return $shop;
    }


}
