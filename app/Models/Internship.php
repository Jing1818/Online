<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internship extends Model
{
    use HasFactory;
    protected $casts=[
        'goal'=>'json',
        'reward_rules'=>'json',
        'core_content'=>'json'
    ];
    protected $fillable = ['title', 'desc', 'content'];
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
