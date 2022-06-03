<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamDetail extends Model
{
    use HasFactory;

    protected $casts = [
        'question_ids' => 'json',
        'question_mark' => 'json'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
