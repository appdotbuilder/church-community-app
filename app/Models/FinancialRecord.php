<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinancialRecord
 *
 * @property int $id
 * @property string $description
 * @property string $type
 * @property float $amount
 * @property \Illuminate\Support\Carbon $received_date
 * @property string|null $contributor
 * @property string|null $notes
 * @property bool $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereContributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereReceivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialRecord published()
 * 
 * @mixin \Eloquent
 */
class FinancialRecord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'description',
        'type',
        'amount',
        'received_date',
        'contributor',
        'notes',
        'is_published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'received_date' => 'date',
        'is_published' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include published records.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}