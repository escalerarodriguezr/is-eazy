<?php
declare(strict_types=1);

namespace IsEazy\Application\EditShop;

use IsEazy\Domain\Shop\Model\Shop;
use IsEazy\Domain\Shop\Service\EditShopService;

class EditShopCommandHandler
{

    public function __construct(
        private readonly EditShopService $editShopService,

    )
    {
    }

    public function __invoke(EditShopCommand $command): Shop
    {
        return $this->editShopService->__invoke($command->id,$command->name);
    }


}
