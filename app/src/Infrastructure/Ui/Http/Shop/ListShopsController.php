<?php
declare(strict_types=1);

namespace IsEazy\Infrastructure\Ui\Http\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use IsEazy\Application\ListAllShopsWithNumberOfProducts\ListAllShopsWithNumberOfProducts;

class ListShopsController
{
    public function __construct(
        private readonly ListAllShopsWithNumberOfProducts $listAllShopsWithNumberOfProducts

    )
    {
    }

    public function __invoke(
        Request $request
    ): JsonResponse
    {
        $shopsCollection = $this->listAllShopsWithNumberOfProducts->__invoke();
        return new JsonResponse(
            $shopsCollection->toArray(),
            Response::HTTP_OK
        );
    }

}
