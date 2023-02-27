<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metrics extends Model
{
    use HasFactory;
    protected $table='users';
             /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected $fillable = [
                'age', 'gender', 'weight', 'height'
            ];
}
