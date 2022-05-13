<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WrittenQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function question_instruction()
    {
        return $this->belongsTo(QuestionInstruction::class, 'id', 'instruction_id');
    }

    public function question_parent_instruction()
    {
        return $this->belongsTo(QuestionParentInstruction::class);
    }
}
