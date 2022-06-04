<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
