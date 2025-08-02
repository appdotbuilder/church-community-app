<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SecretariatItem
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $type
 * @property \Illuminate\Support\Carbon $published_date
 * @property bool $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem wherePublishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SecretariatItem published()
 * 
 * @mixin \Eloquent
 */
class SecretariatItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'content',
        'type',
        'published_date',
        'is_published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include published items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}