<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Stage
 *
 * @property int $id
 * @property int $internship_id
 * @property string $title
 * @property array $stage_goal
 * @property int $day_sign
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $file
 * @property-read \App\Models\Internship $internship
 * @method static \Database\Factories\StageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model recent()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereDaySign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereInternshipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereStageGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stage extends Model
{
    use HasFactory;
    protected $casts=[
      'stage_goal'=>'json',
        'file'=>'json'
    ];

    protected $fillable = ['internship_id', 'title', 'stage_goal', 'day_sign'];
    public function internship(){
        return $this->belongsTo(Internship::class);
    }
}
