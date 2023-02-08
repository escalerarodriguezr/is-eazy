<?php
declare(strict_types=1);

namespace IsEazy\Application\Shared\Cqrs;

interface CommandBus
{
    public function handle($command): mixed;

}
