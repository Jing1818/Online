<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Internship
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $cate_id
 * @property string $cover
 * @property string $slider_images
 * @property int $is_tuijian
 * @property array $goal
 * @property array|null $reward_rules
 * @property array|null $core_content
 * @property int $view_count
 * @property-read \App\Models\Category $category
 * @method static \Database\Factories\InternshipFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Internship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Internship query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model recent()
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereCoreContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereIsTuijian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereRewardRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereSliderImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereViewCount($value)
 * @mixin \Eloquent
 */
class Internship extends Model
{
    use HasFactory;
    protected $casts=[
        'goal'=>'json',
        'reward_rules'=>'json',
        'core_content'=>'json'
    ];
    protected $fillable = ['title', 'desc', 'content'];
    protected $table='internships';
    public function category(){
        return $this->belongsTo(Category::class,'cate_id');
    }
    public function setSliderImagesAttribute($slider_imagse){
        if (is_array($slider_imagse)){
            $this->attributes['slider_images']=json_encode($slider_imagse);
        };
    }
    public function getSliderImagesAttribute($slider_imagse)
    {
        return json_decode($slider_imagse,true);
    }
}
