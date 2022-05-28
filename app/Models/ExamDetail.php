<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamDetail extends Model
{
    use HasFactory;

    protected $casts = [
        'question_id' => 'json',
        'question_mark' => 'json',
    ];
}
