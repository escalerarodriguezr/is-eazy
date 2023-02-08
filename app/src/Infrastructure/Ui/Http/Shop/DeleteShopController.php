<?php
declare(strict_types=1);

namespace IsEazy\Infrastructure\Ui\Http\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use IsEazy\Application\DeleteShop\DeleteShopCommand;
use IsEazy\Application\Shared\Cqrs\CommandBus;

class DeleteShopController
{
    public function __construct(
        private readonly CommandBus $commandBus
    )
    {
    }


    public function __invoke(
        int $id
    ): JsonResponse
    {


        $this->commandBus->handle(
            new DeleteShopCommand($id)

        );

        return new JsonResponse(
            null,
            Response::HTTP_OK
        );
    }


}
