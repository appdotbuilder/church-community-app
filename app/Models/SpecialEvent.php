<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SpecialEvent
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $scheduled_at
 * @property array|null $additional_info
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereAdditionalInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpecialEvent active()
 * 
 * @mixin \Eloquent
 */
class SpecialEvent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'type',
        'description',
        'scheduled_at',
        'additional_info',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'additional_info' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active events.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}