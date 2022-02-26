<?php

namespace App\Traits\Models;

use App\DataAggregators\ReferenceContract;
use App\Models\Reference;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Ramsey\Collection\Collection;

/**
 * @property Collection<Reference> references
 */
trait HasReferences
{
    public function reference(ReferenceContract $reference)
    {
        $this->references()->updateOrCreate([
            'type' => class_basename($reference),
            'value' => $reference->getData(),
        ]);
    }

    public function references(): MorphMany
    {
        return $this->morphMany(Reference::class, 'referenceable');
    }
}
