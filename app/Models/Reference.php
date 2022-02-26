<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
    ];

    protected $casts = [
        'value' => 'json',
    ];

    public function referenceable(): MorphTo
    {
        return $this->morphTo();
    }
}
