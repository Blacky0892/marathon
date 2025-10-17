<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Концертная программа
 * @mixin Builder
 */
class Program extends Model
{
    public    $timestamps = false;

    protected $fillable   = [
        'user_id',
        'order_id',
        'type',
    ];
}
