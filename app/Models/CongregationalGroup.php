<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CongregationalGroup
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property array|null $schedule
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup whereSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CongregationalGroup active()

 * 
 * @mixin \Eloquent
 */
class CongregationalGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'schedule',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'schedule' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active groups.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}