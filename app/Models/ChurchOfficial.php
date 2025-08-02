<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChurchOfficial
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string|null $department
 * @property string|null $description
 * @property int $order_priority
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereOrderPriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOfficial active()
 * 
 * @mixin \Eloquent
 */
class ChurchOfficial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'position',
        'department',
        'description',
        'order_priority',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order_priority' => 'integer',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active officials.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}