<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTrainingInfo extends Model
{
    use HasFactory;

    protected $casts = [
        'topic_covered' => 'json'
    ];

    protected $guarded = [];
}
