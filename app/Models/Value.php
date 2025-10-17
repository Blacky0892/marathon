<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Оценка в номинации
 * @mixin Builder
 */
class Value extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'values',
    ];

    protected $casts    = [
        'values' => 'json',
    ];

    /**
     * Пользователь, поставивший оценку
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
