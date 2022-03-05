<?php

declare(strict_types=1);

namespace App\DataAggregators\WikiApi\References;

use App\DataAggregators\ReferenceContract;
use JetBrains\PhpStorm\ArrayShape;

class CategoryReference implements ReferenceContract
{
    public function __construct(private string $page)
    {
    }

    #[ArrayShape(['page' => "int"])] public function getData(): array
    {
        return ['page' => $this->page];
    }

    public function setData(array $data): void
    {
        $this->page = $data['page'];
    }
}
