<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EditedQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question_id', 'user_id', 'question', 'option_1', 'option_2', 'option_3', 'option_4', 'option_5',
        'answer', 'written_answer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
