<?php

declare(strict_types=1);

namespace App\DataAggregators;

class DataAggregatorManager
{
    public function __construct(private array $dataProvidersClasses)
    {
    }

    public function aggregateData()
    {
        foreach ($this->dataProvidersClasses as $dataProviderClass) {
            /** @var DataProviderAbstract $dataProvider */
            $dataProvider = app($dataProviderClass);

            /** @var DataProviderHandlerContract $handler */
            $handler = app($dataProvider->getHandlerClass());
            $handler->handle($dataProvider);
        }
    }
}
