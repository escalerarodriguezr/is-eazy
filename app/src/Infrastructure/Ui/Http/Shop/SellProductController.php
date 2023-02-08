<?php
declare(strict_types=1);

namespace IsEazy\Infrastructure\Ui\Http\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use IsEazy\Application\SellProductOfShop\SellProductOfShopCommand;
use IsEazy\Application\Shared\Cqrs\CommandBus;


class SellProductController
{


    public function __construct(
        private readonly CommandBus $commandBus
    )
    {
    }

    public function __invoke(
        int $shopId,
        int $productId
    ): JsonResponse
    {

        $stock = $this->commandBus->handle(
            new SellProductOfShopCommand(
                $shopId,
                $productId
            )
        );

        $messageResponse = sprintf('Product sold, %d units of the product remain in stock', $stock);

        if( $stock < 2 ){
            $messageResponse = sprintf('ALERT!! Product sold, %d units of the product remain in stock', $stock);
        }

        return new JsonResponse(
            ['operationResult' => $messageResponse],
            Response::HTTP_OK
        );
    }

}
