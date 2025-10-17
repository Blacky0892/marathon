<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Номинации
 * @mixin Builder
 */
class Nomination extends Model
{
    /**
     * Эксперты в данной номинации
     * @return BelongsToMany
     */
    public function experts(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
