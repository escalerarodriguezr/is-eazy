<?php
declare(strict_types=1);

namespace IsEazy\Application\DeleteShop;

use IsEazy\Domain\Shop\Service\DeleteShopService;

class DeleteShopCommandHandler
{

    public function __construct(
        private readonly DeleteShopService $deleteShopService

    )
    {
    }

    public function __invoke(DeleteShopCommand $command): void
    {
        $this->deleteShopService->__invoke($command->id);
    }

}
