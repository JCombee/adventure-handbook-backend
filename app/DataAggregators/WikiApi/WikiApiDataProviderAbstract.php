<?php

declare(strict_types=1);

namespace App\DataAggregators\WikiApi;

use App\DataAggregators\DataProviderAbstract;

abstract class WikiApiDataProviderAbstract extends DataProviderAbstract
{
    protected string $handlerClass = WikiApiDataProviderDataProviderHandler::class;

    protected array $parameters = [];

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
