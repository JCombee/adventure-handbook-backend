<?php

return [
    'providers' => [
        App\DataAggregators\WikiApi\DataProviders\CharacterListDataProvider::class,
    ],

    'handler' => [
        'wiki-api' => [
            'url' => 'https://genshin-impact.fandom.com/api.php',
        ],
    ],
];
