<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Заявка на участие
 * @mixin Builder
 */
class Order extends Model
{
    use SoftDeletes;

    protected static array $statuses = [
        100 => 'Новая заявка',
    ];

    protected $fillable = [
        'user_id',
        'school_id',
        'area_id',
        'mrsd',
        'link',
        'stage',
        'class',
        'count_student',
        'count_adult',
    ];


    /**
     * Пользователь, создавший заявку
     * @return BelongsTo
     */
    /*public function nomination(): BelongsTo
    {
        return $this->belongsTo(Nomination::class);
    }*/

    /**
     * ОО в данной заявке
     * @return HasMany
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Оценки
     * @return HasMany
     */
    public function values(): HasMany
    {
        return $this->hasMany(Value::class);
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'programs', 'order_id', 'user_id')->withPivot('type');
    }

}
