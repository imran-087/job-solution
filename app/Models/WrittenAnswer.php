<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrittenAnswer extends Model
{
    use HasFactory;

    protected $guarded = [
        'written_question_test_id',
        'answer'
    ];

    public function written_question()
    {
        return $this->belongsTo(WrittenQuestionTest::class);
    }
}
