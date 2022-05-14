<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionParentInstruction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function question_instruction()
    {
        return $this->hasMany(QuestionInstruction::class);
    }

    public function written_questions()
    {
        return $this->hasMany(WrittenQuestion::class);
    }
}
