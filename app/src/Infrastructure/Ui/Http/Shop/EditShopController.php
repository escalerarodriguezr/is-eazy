<?php
declare(strict_types=1);

namespace IsEazy\Infrastructure\Ui\Http\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use IsEazy\Application\EditShop\EditShopCommand;
use IsEazy\Application\Shared\Cqrs\CommandBus;


class EditShopController
{

    public function __construct(
        private readonly CommandBus $commandBus
    )
    {
    }

    public function __invoke(
        Request $request,
        int $id,
    ): JsonResponse
    {
        $request->validate([
            'name' => 'nullable|sometimes|unique:shops,name' . ($id ? ',' . $id : '').'|max:255'
        ]);

        $shop = $this->commandBus->handle(
            new EditShopCommand(
                $id,
                $request->name
            )
        );

        return new JsonResponse(
            ['shop' => $shop->toArray()],
            Response::HTTP_OK
        );
    }

}
