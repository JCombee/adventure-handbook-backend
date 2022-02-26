<?php

declare(strict_types=1);

namespace App\DataAggregators;

interface ReferenceContract
{
    public function setData(array $data): void;

    public function getData(): array;
}
