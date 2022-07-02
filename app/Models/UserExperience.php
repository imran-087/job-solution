<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;

    protected $casts = [
        'area_of_expertise' => 'json'
    ];

    protected $guarded = [];
}
