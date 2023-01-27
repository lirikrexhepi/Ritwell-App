<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    protected $table='recipe';

            /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected $fillable = [
                'title', 'recipe','time','image'
            ];
}
 