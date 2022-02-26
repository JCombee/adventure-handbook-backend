<?php

declare(strict_types=1);

namespace App\DataAggregators\WikiApi\DataProviders;

use App\DataAggregators\WikiApi\References\PageIdReference;
use App\DataAggregators\WikiApi\WikiApiDataProviderAbstract;
use App\Models\Character;

class CharacterListDataProvider extends WikiApiDataProviderAbstract
{
    protected array $parameters = [
        'action' => 'query',
        'list' => 'categorymembers',
        'cmtitle' => 'Category:Playable_Characters',
        'cmlimit' => 500,
    ];

    public function handle(array $data): void
    {
        $characters = array_filter(
            $data['query']['categorymembers'],
            static fn($character) => $character['ns'] === 0
        );

        foreach ($characters as $character) {
            /** @var Character $characterModel */
            $characterModel = Character::query()
                ->updateOrCreate([
                    'name' => $character['title'],
                ]);

            $reference = new PageIdReference($character['pageid']);

            $characterModel->references()->updateOrCreate([
                'type' => PageIdReference::class,
                'value' => $reference->getData(),
            ]);
        }
    }
}
