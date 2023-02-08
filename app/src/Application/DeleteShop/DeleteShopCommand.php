<?php
declare(strict_types=1);

namespace IsEazy\Application\DeleteShop;

class DeleteShopCommand
{

    public function __construct(
        public readonly int $id
    )
    {
    }
}
