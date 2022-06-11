<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fields() : Relation
    {
        return $this->hasOne(SubscriberField::class, 'subscriber_id');
    }
}
