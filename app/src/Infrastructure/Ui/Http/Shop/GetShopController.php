<?php
declare(strict_types=1);

namespace IsEazy\Infrastructure\Ui\Http\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use IsEazy\Domain\Shop\Model\Shop;

class GetShopController
{

    public function __invoke(
        int $id
    ): JsonResponse
    {
        return new JsonResponse(
            Shop::WithProducts()->find($id)->toArray(),
            Response::HTTP_OK
        );
    }

}
