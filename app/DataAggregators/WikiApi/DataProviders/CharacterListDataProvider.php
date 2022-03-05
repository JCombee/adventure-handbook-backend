<?php

declare(strict_types=1);

namespace App\DataAggregators\WikiApi\DataProviders;

use App\DataAggregators\WikiApi\References\CategoryReference;
use App\DataAggregators\WikiApi\WikiApiDataProviderAbstract;
use App\Models\Character;
use Illuminate\Support\Str;

class CharacterListDataProvider extends WikiApiDataProviderAbstract
{
    public const PAGE = 'Category:Playable_Characters';

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
                    'slug' => Str::slug($character['title']),
                ], [
                    'name' => $character['title'],
                    'page_id' => $character['pageid'],
                ]);

            $reference = new CategoryReference(static::PAGE);

            $characterModel->references()->updateOrCreate([
                'type' => CategoryReference::class,
                'value' => $reference->getData(),
            ]);
        }
    }
}
