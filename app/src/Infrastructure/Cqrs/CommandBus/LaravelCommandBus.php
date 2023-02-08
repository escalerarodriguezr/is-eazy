<?php
declare(strict_types=1);

namespace IsEazy\Infrastructure\Cqrs\CommandBus;

use Illuminate\Support\Facades\DB;
use IsEazy\Application\Shared\Cqrs\CommandBus;
use IsEazy\Infrastructure\Cqrs\HandlerResolver;


class LaravelCommandBus implements CommandBus
{
    public function __construct(
        private readonly HandlerResolver $handlerResolver
    )
    {
    }

    public function handle(mixed $command): mixed
    {
        if (!app()->environment('testing')) {
            DB::beginTransaction();
        }

        try {
            $handler = $this->handlerResolver->__invoke($command);
            if (!app()->environment('testing')) {
                DB::commit();
            }
            return $handler($command);
        } catch (\Throwable $e) {
            if (!app()->environment('testing')) {
                DB::rollBack();
            }
            throw $e;
        }



    }

}
