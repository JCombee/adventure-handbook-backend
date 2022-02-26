<?php

declare(strict_types=1);

namespace App\DataAggregators;

interface DataProviderHandlerContract
{
    public function handle(DataProviderAbstract $dataProvider): void;
}
