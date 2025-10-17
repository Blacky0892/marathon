<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 * @mixin Builder
 */
class School extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'mrsd',
        'ekis_id',
        'area_id',
    ];

    /**
     * Округ ОО
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
