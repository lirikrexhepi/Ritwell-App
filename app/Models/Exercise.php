<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $fillable = [
        'workout_plan_id', 'exercise_name', 'exercise_description', 'week', 'day', 'sets', 'reps', 'rest'
    ];
}
