<?php

declare(strict_types=1);

namespace App\DataAggregators\WikiApi;

use App\DataAggregators\DataProviderAbstract;
use App\DataAggregators\DataProviderHandlerContract;
use GuzzleHttp\Client;

class WikiApiDataProviderDataProviderHandler implements DataProviderHandlerContract
{
    public function __construct(
        private Client $client,
        private string $baseUrl
    ) {
    }

    public function handle(WikiApiDataProviderAbstract|DataProviderAbstract $dataProvider): void
    {
        $response = $this->client->get(
            $this->baseUrl,
            [
                'query' => [
                    ...$dataProvider->getParameters(),
                    'format' => 'json',
                ],
            ]
        );

        $data = json_decode($response->getBody()->getContents(), true);

        $dataProvider->handle($data);
    }
}
