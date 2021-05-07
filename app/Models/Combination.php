<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Combination
 *
 * @property int $id
 * @property int $internship_id
 * @property int $cycle_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CombinationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Combination newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Combination newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Combination query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model recent()
 * @method static \Illuminate\Database\Eloquent\Builder|Combination whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Combination whereCycleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Combination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Combination whereInternshipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Combination whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Combination extends Model
{
    use HasFactory;
    
    protected $fillable = ['internship_id', 'cycle_id'];
}
