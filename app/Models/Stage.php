<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;
    protected $casts=[
      'stage_goal'=>'json'
    ];

    protected $fillable = ['internship_id', 'title', 'stage_goal', 'day_sign'];
    public function internship(){
        return $this->belongsTo(Internship::class);
    }
}
