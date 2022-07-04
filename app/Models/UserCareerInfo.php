<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCareerInfo extends Model
{
    use HasFactory;

    protected $casts = [
        'job_categories' => 'json',
        'special_skill' => 'json'
    ];

    protected $guarded = [];
}
