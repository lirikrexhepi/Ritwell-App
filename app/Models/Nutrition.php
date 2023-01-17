<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;

    protected $table='nutrition_plan';
            /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected $fillable = [
                'title', 'description', 'calories', 'proteins', 'carbohydrates', 'timeOfDay'
            ];
}
