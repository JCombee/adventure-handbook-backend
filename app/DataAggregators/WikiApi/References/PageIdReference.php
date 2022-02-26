<?php

declare(strict_types=1);

namespace App\DataAggregators\WikiApi\References;

use App\DataAggregators\ReferenceContract;
use JetBrains\PhpStorm\ArrayShape;

class PageIdReference implements ReferenceContract
{
    public function __construct(private int $pageId)
    {
    }

    #[ArrayShape(['pageId' => "int"])] public function getData(): array
    {
        return ['pageId' => $this->pageId];
    }

    public function setData(array $data): void
    {
        $this->pageId = $data['pageId'];
    }
}
