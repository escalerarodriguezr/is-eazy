<?php
declare(strict_types=1);

namespace IsEazy\Infrastructure\Ui\Http\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use IsEazy\Application\CreateShop\CreateShopCommand;
use IsEazy\Application\Shared\Cqrs\CommandBus;


class CreateShopController
{

    public function __construct(
        private readonly CommandBus $commandBus
    )
    {
    }

    public function __invoke(
        Request $request
    ): JsonResponse
    {
        $request->validate([
            'name' => 'required|unique:shops|max:255',
            'products.*' => 'nullable|sometimes',
            'products.*.name' => 'required|max:255'

        ]);

        $shop = $this->commandBus->handle(
            new CreateShopCommand(
                $request->name,
                $request->products ?? []
            )
        );

        return new JsonResponse(
            ['shop' => $shop->toArray()],
            Response::HTTP_CREATED
        );
    }

}
