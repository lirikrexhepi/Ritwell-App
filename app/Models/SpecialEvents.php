<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialEvents extends Model
{
    use HasFactory;
    protected $table='special_events';
             /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected $fillable = [
                'title', 'description','eventType'
            ];
}
