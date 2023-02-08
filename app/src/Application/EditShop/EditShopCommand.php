<?php
declare(strict_types=1);

namespace IsEazy\Application\EditShop;

class EditShopCommand
{

    public function __construct(
        public readonly int $id,
        public readonly ?string $name = null
    )
    {
    }
}
