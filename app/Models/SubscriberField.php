<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriberField extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'value' => 'array'
    ];
}
