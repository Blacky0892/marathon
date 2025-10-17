<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Роль пользователя
 * @mixin Builder
 */
class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Пользователи с данной ролью
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
