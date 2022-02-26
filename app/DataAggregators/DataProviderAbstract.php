<?php

declare(strict_types=1);

namespace App\DataAggregators;

abstract class DataProviderAbstract
{
    protected string $handlerClass;

    public function getHandlerClass(): string
    {
        return $this->handlerClass;
    }

    abstract public function handle(array $data): void;
}
