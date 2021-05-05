<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;
    
    protected $fillable = ['internship_id', 'title', 'stage_goal', 'day_sign'];
}
