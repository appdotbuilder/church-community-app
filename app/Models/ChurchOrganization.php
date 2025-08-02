<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChurchOrganization
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $description
 * @property array|null $schedule
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChurchOrganization active()
 * 
 * @mixin \Eloquent
 */
class ChurchOrganization extends Model
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
     * Scope a query to only include active organizations.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}