<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;


class ExamDetail extends Model
{
    use HasFactory, HasJsonRelationships;

    protected $casts = [
        'question_ids' => 'json',
        'question_mark' => 'json'
    ];

    //json relationship with question
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_ids->question_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
