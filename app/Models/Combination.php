<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Combination extends Model
{
    use HasFactory;
    
    protected $fillable = ['internship_id', 'cycle_id'];
}
