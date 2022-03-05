<?php

namespace App\Models;

use App\Traits\Models\HasReferences;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory, HasReferences;

    protected $fillable = [
        'slug',
        'name',
    ];


}
