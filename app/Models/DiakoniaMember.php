<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DiakoniaMember
 *
 * @property int $id
 * @property string $name
 * @property string $domicile_group
 * @property string $place_of_care
 * @property string|null $condition
 * @property \Illuminate\Support\Carbon|null $care_started
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereCareStarted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereDomicileGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember wherePlaceOfCare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiakoniaMember active()
 * 
 * @mixin \Eloquent
 */
class DiakoniaMember extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'domicile_group',
        'place_of_care',
        'condition',
        'care_started',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'care_started' => 'date',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active members.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}